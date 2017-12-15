<?php

    use Strings\Str;

    if (!function_exists('str')) {

        function str($value = null)
        {
            return Str::on($value);
        }
    }

?>