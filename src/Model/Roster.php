<?php
namespace Eddy\AflTables\Model;

class Roster extends BaseModel
{
    protected $attributes = [
        'season' => ['type' => 'int'],
        'team',

    ];
}
