<?php
namespace Eddy\AflTables\Factory;

use Eddy\AflTables\Model\Player;
use Eddy\AflTables\Contract\Model;
use Eddy\AflTables\Contract\Factory;

class PlayerFactory implements Factory
{
    public function buildFrom(array $data): Model
    {
        if (isset($data['name'])
            && !isset($data['surname'])
            && !isset($data['first_name'])
        ) {
            $name = preg_split('/\s/', $data['name'], 2, PREG_SPLIT_NO_EMPTY);
            $data['first_name'] = $name[0];
            $data['surname'] = $name[1];
        }
        $player = [
            'surname' => $data['surname'] ?? null,
            'first_name' => $data['first_name'] ?? null,
            'afl_tables_id' => $data['afl_tables_id'] ?? null
        ];
        return new Player($data);
    }
}
