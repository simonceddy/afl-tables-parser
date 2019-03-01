<?php
namespace AflParser\Support\Laravel\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'surname',
        'given_name'
    ];
}