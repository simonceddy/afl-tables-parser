<?php
namespace AflParser\Support\ColumnMap;

interface ColumnMapInterface
{
    /**
     * Returns an array of column mappings (number => column name).
     *
     * @return array
     */
    public function mappings(): array;
}
