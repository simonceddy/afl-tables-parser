<?php
namespace AflParser\Mappings;

interface MappingsInterface
{
    /**
     * Returns an array of column mappings (number => column name).
     *
     * @return array
     */
    public function mappings(): array;
}
