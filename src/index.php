<?php

use Strings\Str;

require 'Str.php';

$string = $str = Str::on('mY StrIng');
$string2 = $str->camelCase()->toString(); // true
//$string3 = $str->snakeCase()->toString() ; // true
//$string4 = $str->studlyCase()->toString(); // true
//$string5 = $str->titleCase()->toString(); // true
//$string6 = $str->slugCase()->toString() ; // true
//$string7 = $str->kebabCase()->toString()'; // true
//$string8 = $str->toString() ; // true
//$string9 = (string) $str ; // true

var_dump('String : '.$string);
var_dump('CamelCase : '.$string2);
//var_dump('SnakeCase : '.$string3);
//var_dump('StudlyCase : '.$string4);
//var_dump('TitleCase : '.$string5);
//var_dump('SlugCase : '.$string6);
//var_dump('KebabCase : '.$string7);
//var_dump('toString : '.$string8);
//var_dump('Object : '.$string9);
