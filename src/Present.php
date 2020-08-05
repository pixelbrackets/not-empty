<?php

namespace Pixelbrackets\NotEmpty;

class Present
{
    public static function present($variable)
    {
        return !\Pixelbrackets\NotEmpty\Blank::blank($variable);
    }
}
