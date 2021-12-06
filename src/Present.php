<?php

if (!function_exists('present')) {
    function present($variable)
    {
        return !blank($variable);
    }
}
