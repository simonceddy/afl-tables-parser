<?php
namespace Eddy\AflTables\Factory;

use Eddy\AflTables\Model\Team;
use Eddy\AflTables\Contract\Model;
use Eddy\AflTables\Contract\Factory;

class TeamFactory implements Factory
{
    public function buildFrom(array $data): Model
    {
        return new Team($data);
    }
}
