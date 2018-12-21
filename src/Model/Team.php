<?php
namespace Eddy\AflTables\Model;

use Eddy\Norm\Model;

class Team extends Model
{
    protected $attributes = [
        'team_short',
        'city',
        'name'
    ];
}
