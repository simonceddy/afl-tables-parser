<?php
namespace Eddy\AflTables\Factory;

use Eddy\AflTables\Contract\Factory;
use Eddy\AflTables\Contract\Model;
use Eddy\AflTables\Model\Match;

class MatchFactory implements Factory
{
    public function buildFrom(array $data): Model
    {
        return new Match($data);
    }
}
