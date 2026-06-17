@echo off
REM EduPro Classroom — Setup script for Windows
REM Run: setup.bat

echo.
echo ============================================================
echo   EduPro Classroom -- Setup (Windows)
echo ============================================================
echo.

REM Check Node.js
where node >nul 2>nul
if %errorlevel% neq 0 (
    echo ERROR: Node.js not found.
    echo Download and install Node.js 18+ from: https://nodejs.org
    pause
    exit /b 1
)
for /f "tokens=*" %%i in ('node -v') do set NODE_VER=%%i
echo [OK] Node.js %NODE_VER%

REM npm install
echo.
echo Installing npm packages (may take 2-3 minutes)...
call npm install
if %errorlevel% neq 0 ( echo ERROR: npm install failed & pause & exit /b 1 )

REM SSL certs
echo.
echo Generating SSL certificate...
where openssl >nul 2>nul
if %errorlevel% neq 0 (
    echo WARNING: openssl not found. Trying node fallback...
)
call npm run certs
if %errorlevel% neq 0 (
    echo ERROR: Certificate generation failed.
    echo Install OpenSSL: https://slproweb.com/products/Win32OpenSSL.html
    pause
    exit /b 1
)

echo.
echo ============================================================
echo   Setup complete!
echo.
echo   Start the server:  npm start
echo   Or double-click:   start.bat
echo.
echo   Dashboard : https://192.168.1.188:3000
echo   Board     : https://192.168.1.188:3000/board
echo   Tablet    : https://192.168.1.188:3000/tablet
echo ============================================================
echo.
pause
