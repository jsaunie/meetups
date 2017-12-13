<?php

use Strings\Str;

require 'Str.php';


$string2 = Str::on('My String')->snakeCase()->toString();

var_dump($string2);

