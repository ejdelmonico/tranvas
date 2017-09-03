<?php

use Illuminate\Support\Str;

if (! function_exists('limit_words')) {
    /**
     * @param $string
     * @param int $words
     * @param string $end
     * @return string
     */
    function limit_words($string, $words = 100, $end = '...')
    {
        return Str::words($string, $words, $end);
    }
}
