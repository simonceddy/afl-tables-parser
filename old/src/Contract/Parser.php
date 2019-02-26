<?php
namespace Eddy\AflTables\Contract;

interface Parser
{
    public function parse(string $input): array;
}
