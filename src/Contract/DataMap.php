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

    public static function ignore(): array;
}
