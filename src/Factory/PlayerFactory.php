<?php
namespace Eddy\AflTables\Factory;

use Eddy\AflTables\Model\Player;
use Eddy\AflTables\Contract\Model;
use Eddy\AflTables\Contract\Factory;

class PlayerFactory implements Factory
{
    public function buildFrom(array $data): Model
    {
        $data = [
            'name' => $data['name'] ?? null,
            'afl_tables_id' => $data['afl_tables_id'] ?? null
        ];
        return new Player($data);
    }
}
