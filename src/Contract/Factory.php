<?php
namespace Eddy\AflTables\Contract;

interface Factory
{
    public function buildFrom(array $data): Model;
}

