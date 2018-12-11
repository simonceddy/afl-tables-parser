<?php
namespace Eddy\AflTables\Model;

use Eddy\AflTables\Contract\Model\Team as TeamContract;

class Team extends BaseModel implements TeamContract
{
    protected $attributes = [
        'team_short',
    ];
}
