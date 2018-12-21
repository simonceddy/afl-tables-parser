<?php
namespace Eddy\AflTables\Model;

use Eddy\Norm\Model;

class Roster extends Model
{
    protected $attributes = [
        'season' => ['type' => 'int'],
        'team',
    ];
}
