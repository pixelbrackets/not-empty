<?php

namespace Pixelbrackets\NotEmpty;

class Blank
{
    public static function blank($variable)
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
