<?php

use Strings\Str;

require 'Str.php';

$string = $str = Str::on('mY StrIng');
$string2 = $str->camelCase()->toString(); // true
$string3 = $str->snakeCase()->toString() ; // true
$string4 = $str->studlyCase()->toString(); // true
$string5 = $str->titleCase()->toString(); // true
$string6 = $str->slugCase()->toString() ; // true
//$string7 = $str->kebabCase()->toString()'; // true
$string8 = $str->toString() ; // true
$string9 = (string) $str ; // true

var_dump('String 1 : '.$string);
var_dump('String 2 : '.$string2);
var_dump('String 3 : '.$string3);
var_dump('String 4 : '.$string4);
var_dump('String 5 : '.$string5);
var_dump('String 6 : '.$string6);
//var_dump('String 7 : '.$string7);
var_dump('String 8 : '.$string8);
var_dump('String 9 : '.$string9);
