@echo off
setlocal
cd /d "%~dp0\..\.."
php tools\i18n\p114d4r_fix_catalog_missing_comma.php
exit /b %ERRORLEVEL%
