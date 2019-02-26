<?php
namespace Eddy\AflTables\Model;

use Eddy\Norm\Model;

class Season extends Model
{
    protected $attributes = [
        'year' => ['type' => 'year']
    ];
}
