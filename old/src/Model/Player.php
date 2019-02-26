<?php
namespace Eddy\AflTables\Model;

use Eddy\Norm\Model;

class Player extends Model
{
    protected $attributes = [
        'surname',
        'first_name',
        'afl_tables_id'
    ];
}
