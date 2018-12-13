<?php
namespace Eddy\AflTables\Model;

use Eddy\AflTables\Contract\Model\Player as PlayerContract;

class Player extends BaseModel implements PlayerContract
{
    protected $attributes = [
        'surname',
        'first_name',
        'afl_tables_id'
    ];
}
