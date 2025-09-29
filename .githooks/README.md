# Setup githooks
Execute `git config core.hooksPath .githooks` in the local repo and you're all set.

## Optional Steps
- Install php-ast extension to speed up phan analysis, on ubuntu based system you can use `apt install php-ast`,
on other *nix systems you can use you can use `pecl install ast` and for windows you can download a DLL using this
[link](https://windows.php.net/downloads/pecl/releases/ast/)

## Pre-commit hook
runs the following checks on the staged files:
- git diff --check looking for leftover conflict markers, whitespace errors are ignored via config
- phan with the issue reporting level set to critical, reporting e.g.syntax errors and definitive type errors
- phpmd with priority set to 1 (max) and with the usage of a relaxed rule file and a baseline file

## Bypass hook
If the hook fails with an error you can't handle right now you can bypass it using the option --no-verify for git commit
If you wan't to disable the hook altogether execute `git config --unset core.hooksPath` to reset the path where git looks for hooks
