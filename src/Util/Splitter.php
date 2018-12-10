<?php

namespace Eddy\AflTables\Util;

class Splitter
{
    public static function splitLines(string $input)
    {
        return explode(PHP_EOL, $input);
    }

    public static function splitWhitespace(string $input)
    {
        return preg_split('/\w*/', $input);
    }

    public static function splitMultiWhitespace(string $input)
    {
        return preg_split('/\w(\w*)/', $input);
    }

    public static function splitPattern(string $pattern, string $input)
    {
        return preg_split($pattern, $input);
    }
}
