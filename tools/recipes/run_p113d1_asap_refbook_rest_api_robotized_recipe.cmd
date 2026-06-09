@echo off
setlocal EnableExtensions
cd /d "%~dp0..\.."

if not defined ASAP_P113D1_REST_PORT set ASAP_P113D1_REST_PORT=8793

php "tools\recipes\p113d1_asap_refbook_rest_api_robotized_recipe.php"
set "EXITCODE=%ERRORLEVEL%"

if "%EXITCODE%"=="0" (
  echo.
  echo Ouverture du rapport P113D1...
  if exist "var\reports\p113d1\p113d1_refbook_rest_api_report.html" start "" "var\reports\p113d1\p113d1_refbook_rest_api_report.html"
  echo.
  echo Demarrage API REST RefBook locale sur 127.0.0.1:%ASAP_P113D1_REST_PORT%
  start "ASAP P113D1 RefBook REST API" cmd /k php -S 127.0.0.1:%ASAP_P113D1_REST_PORT% "tools\server\asap_refbook_rest_router.php"
  timeout /t 2 /nobreak >nul
  start "" "http://127.0.0.1:%ASAP_P113D1_REST_PORT%/api/refbook/health"
  start "" "http://127.0.0.1:%ASAP_P113D1_REST_PORT%/api/refbook/diagrams/framework-fsm-runtime"
)

echo.
echo ExitCode=%EXITCODE%
exit /b %EXITCODE%
