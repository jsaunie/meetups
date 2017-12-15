<?php

require('..\vendor\autoload.php');


$str = str('mY StrIng');
$str->camelCase; // true
$str->snakeCase; // true
$str->studlyCase; // true
$str->titleCase; // true
$str->slugCase; // true
$str->kebabCase; // true
//$str(); // true

echo $str();
