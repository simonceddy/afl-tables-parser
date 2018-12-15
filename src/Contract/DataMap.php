<?php
namespace Eddy\AflTables\Contract;

interface DataMap
{
    /**
     * Should return the entire data map
     *
     * @return array
     */
    public static function map(): array;

    /**
     * Should return an array of keys to ignore.
     * 
     * Can return an empty array if no keys should be ignored.
     *
     * @return array
     */
    public static function ignore(): array;
}
