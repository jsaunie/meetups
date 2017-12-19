<?php

require('..\vendor\autoload.php');

$kebab = str('-mY StrIng')
    ->camelCase()
    ->snakeCase()
    ->studlyCase()
    ->titleCase()
    ->slugCase()
    ->kebabCase;
var_dump($kebab);