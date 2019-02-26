<?php
namespace Eddy\AflTables\Model;

use Eddy\Norm\Model;

class Statline extends Model
{
    protected $attributes = [
        'player',
        'round',
        'kicks',
        'marks',
        'handballs',
        'total_disp',
        'goals',
        'behinds',
        'hitouts',
        'tackles',
        'rebound_50',
        'inside_50',
        'clearances',
        'clangers',
        'frees_for',
        'frees_against',
        'brownlow_votes',
        'uc_pos',
        'c_pos',
        'c_marks',
        'marks_i50',
        'one_perc',
        'bounces',
        'goal_assists',
        'time_on_ground',
    ];
}
