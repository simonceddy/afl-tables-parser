<?php
namespace Eddy\AflTables\Map;

use Eddy\AflTables\Contract\DataMap;

class SeasonTxtMap implements DataMap
{
    protected static $map = [
        0 => 'name',
        1 => 'afl_tables_id',
        2 => 'team',
        3 => 'opponent',
        4 => 'round',
        5 => 'kicks',
        6 => 'marks',
        7 => 'handballs',
        8 => 'total_disp',
        9 => 'goals',
        10 => 'behinds',
        11 => 'hitouts',
        12 => 'tackles',
        13 => 'rebound_50',
        14 => 'inside_50',
        15 => 'clearances',
        16 => 'clangers',
        17 => 'frees_for',
        18 => 'frees_against',
        19 => 'brownlow_votes',
        20 => 'uc_pos',
        21 => 'c_pos',
        22 => 'c_marks',
        23 => 'marks_i50',
        24 => 'one_perc',
        25 => 'bounces',
        26 => 'goal_assists',
        27 => 'time_on_ground',
    ];

    public function find($key)
    {
        return static::$map[$key] ?? false;
    }

    public static function map(): array
    {
        return self::$map;
    }

    public static function ignore(): array
    {
        return [];
    }
}
