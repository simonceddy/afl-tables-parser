<?php
namespace Eddy\AflTables\Model;

use Eddy\Norm\Model;

class Round extends Model
{
    protected $attributes = [
        'number' => ['type' => 'int'],
        'season'
    ];
}
