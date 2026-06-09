@echo off
setlocal
cd /d "%~dp0\..\.."
php tools\i18n\p114d4_apply_fsm_first_batch.php
exit /b %ERRORLEVEL%
