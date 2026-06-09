@echo off
setlocal
cd /d "%~dp0\..\.."
php tools\smoke\p114d4_asap_doc_i18n_fsm_first_batch_smoke.php
exit /b %ERRORLEVEL%
