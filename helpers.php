<?php

    use Strings\Str;

    if (!function_exists('str')) {
        function str($value)
        {
            return Str::on($value);
        }
    }
