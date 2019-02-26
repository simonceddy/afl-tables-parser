<?php
namespace Eddy\AflTables\Contract;

use Eddy\Norm\Contract\Model;

interface Factory
{
    public function buildFrom(array $data): Model;
}

