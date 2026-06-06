@echo off
setlocal EnableExtensions

set "ASAP_ROOT=%~dp0..\.."
pushd "%ASAP_ROOT%" >nul || goto asap_missing

php -d display_errors=1 tools\recipes\asap_full_recipe.php || goto recipe_failed

popd >nul
exit /b 0

:asap_missing
echo ASAP_ROOT_MISSING
exit /b 1

:recipe_failed
popd >nul
echo ASAP_GLOBAL_RECIPE_CMD_FAILED
exit /b 1
