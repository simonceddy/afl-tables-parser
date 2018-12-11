<?php
namespace Eddy\AflTables\Factory;

use Eddy\AflTables\Model\Player;
use Eddy\AflTables\Contract\Model;
use Eddy\AflTables\Contract\Factory;

class PlayerFactory implements Factory
{
    public function build(array $data): Model
    {
        return new Player($data);
    }
}
