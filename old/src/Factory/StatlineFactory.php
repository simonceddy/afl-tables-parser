<?php
namespace Eddy\AflTables\Factory;

use Eddy\AflTables\Model\Statline;
use Eddy\Norm\Contract\Model;
use Eddy\AflTables\Contract\Factory;

class StatlineFactory implements Factory
{
    public function buildFrom(array $data): Model
    {
        return new Statline($data);
    }
}
