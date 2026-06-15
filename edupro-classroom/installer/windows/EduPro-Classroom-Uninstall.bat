@echo off
setlocal enabledelayedexpansion
title EduPro Classroom — Uninstaller
color 0C

echo.
echo  ============================================================
echo   EduPro Classroom — Uninstaller
echo  ============================================================
echo.
echo  This will remove EduPro Classroom from your computer.
echo  Installation folder: C:\EduPro\Classroom
echo.
set /p CONFIRM=  Are you sure? Type YES to continue:
if /i not "%CONFIRM%"=="YES" (
    echo  Uninstall cancelled.
    pause
    exit /b 0
)

echo.
echo [1/4] Removing application files...
if exist "C:\EduPro\Classroom" (
    rd /s /q "C:\EduPro\Classroom"
    if errorlevel 1 (
        echo  WARNING: Could not fully remove C:\EduPro\Classroom.
        echo  Try closing any open windows inside that folder and retry.
    ) else (
        echo  Application folder removed.
    )
) else (
    echo  Application folder not found (already removed).
)

:: Remove C:\EduPro if now empty
if exist "C:\EduPro" (
    rd "C:\EduPro" >nul 2>&1
)

echo.
echo [2/4] Removing desktop shortcut...
set DESKTOP=%USERPROFILE%\Desktop
if exist "%DESKTOP%\EduPro Classroom.lnk" (
    del /f /q "%DESKTOP%\EduPro Classroom.lnk"
    echo  Desktop shortcut removed.
) else (
    echo  Desktop shortcut not found.
)

echo.
echo [3/4] Removing Start Menu entries...
set STARTMENU=%APPDATA%\Microsoft\Windows\Start Menu\Programs\EduPro
if exist "%STARTMENU%" (
    rd /s /q "%STARTMENU%"
    echo  Start Menu entries removed.
) else (
    echo  Start Menu entries not found.
)

echo.
echo [4/4] Cleanup complete.

echo.
echo  ============================================================
echo   EduPro Classroom has been removed from this computer.
echo  ============================================================
echo.
pause
endlocal
