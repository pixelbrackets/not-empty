<?php

if (!function_exists('notEmpty')) {
    function notEmpty($variable)
    {
        return !empty($variable);
    }
}
