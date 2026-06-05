@echo off
setlocal EnableExtensions

set "ASAP_ROOT=H:\ASAP"
set "PHP=H:\UwAmp\bin\php\php-8.5.6\php.exe"
set "RECIPE=%ASAP_ROOT%\tests\recipe\p112q2b1_safe_directory_case_normalization_recipe.php"

echo P112Q2B1_SAFE_DIRECTORY_CASE_NORMALIZATION_RECIPE_START

if not exist "%ASAP_ROOT%" goto asap_missing
if not exist "%PHP%" goto php_missing
if not exist "%RECIPE%" goto recipe_missing

"%PHP%" -d display_errors=1 "%RECIPE%" || goto recipe_failed

if exist "%ASAP_ROOT%\tools\automation\p112q1_router_attribute_compiler_recipe_runner.cmd" (
    call "%ASAP_ROOT%\tools\automation\p112q1_router_attribute_compiler_recipe_runner.cmd" || goto q1_recipe_failed
)

echo P112Q2B1_SAFE_DIRECTORY_CASE_NORMALIZATION_RECIPE_OK
exit /b 0

:asap_missing
echo ASAP_ROOT_MISSING
exit /b 1

:php_missing
echo UWAMP_PHP_MISSING
exit /b 1

:recipe_missing
echo P112Q2B1_RECIPE_MISSING
exit /b 1

:recipe_failed
echo P112Q2B1_RECIPE_FAILED
exit /b 1

:q1_recipe_failed
echo P112Q1_ROUTER_ATTRIBUTE_COMPILER_RECIPE_REGRESSION
exit /b 1
