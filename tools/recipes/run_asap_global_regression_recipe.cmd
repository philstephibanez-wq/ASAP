@echo off
setlocal EnableExtensions
cd /d "%~dp0..\.."
php "tools\recipes\asap_global_regression_recipe.php"
set "EXITCODE=%ERRORLEVEL%"
echo.
echo ExitCode=%EXITCODE%
exit /b %EXITCODE%
