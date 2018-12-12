<?php
namespace Eddy\AflTables\Model;

use Eddy\AflTables\Contract\Model\Match as MatchContract;

class Match extends BaseModel implements PlayerContract
{
    protected $attributes = [
        'round',
        'season'
    ];
}
