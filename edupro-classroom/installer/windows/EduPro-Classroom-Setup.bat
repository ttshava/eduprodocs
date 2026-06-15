@echo off
setlocal enabledelayedexpansion
title EduPro Classroom — Windows Installer
color 0A

echo.
echo  ============================================================
echo   EduPro Classroom — Installation Wizard
echo  ============================================================
echo.

:: ---------------------------------------------------------------
:: Check Node.js
:: ---------------------------------------------------------------
echo [1/6] Checking Node.js...
where node >nul 2>&1
if errorlevel 1 (
    echo.
    echo  ERROR: Node.js is not installed.
    echo  Please install Node.js 18 or later from:
    echo    https://nodejs.org
    echo.
    echo  Opening download page in your browser...
    start "" "https://nodejs.org/en/download"
    echo  After installing Node.js, run this installer again.
    pause
    exit /b 1
)

for /f "tokens=1 delims=v" %%v in ('node --version 2^>nul') do set NODE_VER_RAW=%%v
for /f "tokens=1 delims=v" %%v in ('node --version 2^>nul') do set NODE_VER=%%v
for /f "tokens=1 delims=." %%m in ("%NODE_VER%") do set NODE_MAJOR=%%m

if %NODE_MAJOR% LSS 18 (
    echo.
    echo  ERROR: Node.js version 18 or higher is required.
    echo  Your version: v%NODE_VER%
    echo  Please upgrade at https://nodejs.org
    echo.
    start "" "https://nodejs.org/en/download"
    pause
    exit /b 1
)
echo  Node.js v%NODE_VER% found. OK.

:: ---------------------------------------------------------------
:: Create installation directory
:: ---------------------------------------------------------------
echo.
echo [2/6] Creating installation directory...
set INSTALL_DIR=C:\EduPro\Classroom

if not exist "C:\EduPro" (
    mkdir "C:\EduPro"
    if errorlevel 1 (
        echo  ERROR: Could not create C:\EduPro. Run this installer as Administrator.
        pause
        exit /b 1
    )
)
if not exist "%INSTALL_DIR%" (
    mkdir "%INSTALL_DIR%"
    if errorlevel 1 (
        echo  ERROR: Could not create %INSTALL_DIR%. Run this installer as Administrator.
        pause
        exit /b 1
    )
)
echo  Directory %INSTALL_DIR% ready.

:: ---------------------------------------------------------------
:: Copy application files
:: ---------------------------------------------------------------
echo.
echo [3/6] Copying application files...
set SOURCE_DIR=%~dp0..\..

xcopy /E /I /Y "%SOURCE_DIR%\server.js"    "%INSTALL_DIR%\" >nul
xcopy /E /I /Y "%SOURCE_DIR%\package.json" "%INSTALL_DIR%\" >nul
xcopy /E /I /Y "%SOURCE_DIR%\public"       "%INSTALL_DIR%\public\"   >nul
xcopy /E /I /Y "%SOURCE_DIR%\scripts"      "%INSTALL_DIR%\scripts\"  >nul

if errorlevel 1 (
    echo  ERROR: File copy failed. Check that the installer folder is intact.
    pause
    exit /b 1
)
echo  Files copied successfully.

:: ---------------------------------------------------------------
:: Install npm dependencies
:: ---------------------------------------------------------------
echo.
echo [4/6] Installing Node.js dependencies (this may take a minute)...
cd /d "%INSTALL_DIR%"
call npm install --omit=dev
if errorlevel 1 (
    echo  ERROR: npm install failed. Check your internet connection.
    pause
    exit /b 1
)
echo  Dependencies installed.

:: ---------------------------------------------------------------
:: Generate SSL certificates
:: ---------------------------------------------------------------
echo.
echo [5/6] Generating SSL certificates...
call npm run certs
if errorlevel 1 (
    echo  WARNING: Certificate generation failed.
    echo  You can retry later by running: npm run certs
    echo  in %INSTALL_DIR%
) else (
    echo  SSL certificates generated.
)

:: ---------------------------------------------------------------
:: Create desktop shortcut
:: ---------------------------------------------------------------
echo.
echo [6/6] Creating shortcuts...

:: Copy the launcher bat to install dir
copy /Y "%~dp0Start-EduPro-Classroom.bat" "%INSTALL_DIR%\Start-EduPro-Classroom.bat" >nul

:: Desktop shortcut (a .bat shortcut via VBScript)
set DESKTOP=%USERPROFILE%\Desktop
set SHORTCUT_VBS=%TEMP%\edupro_shortcut.vbs

(
echo Set oWS = WScript.CreateObject("WScript.Shell"^)
echo sLinkFile = "%DESKTOP%\EduPro Classroom.lnk"
echo Set oLink = oWS.CreateShortcut(sLinkFile^)
echo oLink.TargetPath = "%INSTALL_DIR%\Start-EduPro-Classroom.bat"
echo oLink.WorkingDirectory = "%INSTALL_DIR%"
echo oLink.Description = "EduPro Classroom Screen Sharing Server"
echo oLink.Save
) > "%SHORTCUT_VBS%"
cscript //nologo "%SHORTCUT_VBS%"
del "%SHORTCUT_VBS%" >nul 2>&1

:: Start Menu shortcut
set STARTMENU=%APPDATA%\Microsoft\Windows\Start Menu\Programs
if not exist "%STARTMENU%\EduPro" mkdir "%STARTMENU%\EduPro"

set STARTMENU_VBS=%TEMP%\edupro_startmenu.vbs
(
echo Set oWS = WScript.CreateObject("WScript.Shell"^)
echo sLinkFile = "%STARTMENU%\EduPro\EduPro Classroom.lnk"
echo Set oLink = oWS.CreateShortcut(sLinkFile^)
echo oLink.TargetPath = "%INSTALL_DIR%\Start-EduPro-Classroom.bat"
echo oLink.WorkingDirectory = "%INSTALL_DIR%"
echo oLink.Description = "EduPro Classroom Screen Sharing Server"
echo oLink.Save
) > "%STARTMENU_VBS%"
cscript //nologo "%STARTMENU_VBS%"
del "%STARTMENU_VBS%" >nul 2>&1

echo  Shortcuts created.

:: ---------------------------------------------------------------
:: Done
:: ---------------------------------------------------------------
echo.
echo  ============================================================
echo   Installation Complete!
echo  ============================================================
echo.
echo   EduPro Classroom is installed at:
echo     %INSTALL_DIR%
echo.
echo   To start the server:
echo     - Double-click "EduPro Classroom" on your Desktop, OR
echo     - Open Start Menu ^> EduPro ^> EduPro Classroom
echo.
echo   Once running, open these URLs in Chrome:
echo     Dashboard : https://192.168.100.176:3000
echo     Board     : https://192.168.100.176:3000/board
echo     Tablets   : https://192.168.100.176:3000/tablet
echo.
echo   IMPORTANT: On first visit, accept the SSL warning in Chrome:
echo     Click Advanced ^> Proceed to 192.168.100.176 (unsafe)
echo.
echo  ============================================================
echo.
pause
endlocal
