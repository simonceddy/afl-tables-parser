<?php
namespace Eddy\AflTables\Contract;

interface Factory
{
    public function build(array $data): Model;
}

