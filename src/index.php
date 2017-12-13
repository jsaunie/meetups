<?php

use Strings\Str;

require 'Str.php';


$string2 = Str::on('my_string')->camelCase()->toString(); //  === 'myString'
var_dump($string2);

