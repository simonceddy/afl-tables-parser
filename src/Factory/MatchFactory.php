<?php
namespace Eddy\AflTables\Factory;

use Eddy\AflTables\Contract\Factory;
use Eddy\Norm\Contract\Model;
use Eddy\Norm\Match;

class MatchFactory implements Factory
{
    public function buildFrom(array $data): Model
    {
        return new Match($data);
    }
}
