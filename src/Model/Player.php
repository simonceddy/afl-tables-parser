<?php
namespace Eddy\AflTables\Model;

use Eddy\AflTables\Contract\Model\Player as PlayerContract;

class Player extends BaseModel implements PlayerContract
{
    protected $attributes = [
        'name',
        'afl_tables_id'
    ];
}
