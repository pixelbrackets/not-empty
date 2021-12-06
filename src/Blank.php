<?php

if (!function_exists('blank')) {
    function blank($variable)
    {
        if (is_string($variable)) {
            $variable = trim($variable);
        }
        if (is_object($variable) && !(array)$variable) {
            return true;
        }

        return empty($variable);
    }
}
