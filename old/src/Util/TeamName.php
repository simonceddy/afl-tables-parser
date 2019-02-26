<?php
namespace Eddy\AflTables\Util;

class TeamName
{
    public static $short = [
        'AD' => ['Adelaide', 'Crows'],
        'BL' => ['Brisbane', 'Lions'],
        'CA' => ['Carlton', 'Blues'],
        'CW' => ['Collingwood', 'Magpies'],
        'ES' => ['Essendon', 'Bombers'],
        'FR' => ['Fremantle', 'Dockers'],
        'GC' => ['Gold Coast', 'Suns'],
        'GE' => ['Geelong', 'Cats'],
        'GW' => ['Greater Western Sydney', 'Giants'],
        'HW' => ['Hawthorn', 'Hawks'],
        'ME' => ['Melbourne', 'Demons'],
        'NM' => ['North Melbourne', 'Kangaroos'],
        'PA' => ['Port Adelaide', 'Power'],
        'RI' => ['Richmond', 'Tigers'],
        'SK' => ['St Kilda', 'Saints'],
        'SY' => ['Sydney', 'Swans'],
        'WB' => ['Western', 'Bulldogs'],
        'WC' => ['West Coast', 'Eagles'],
    ];

    protected static $historical = [
        'UN' => ['University', ''],
        'FI' => ['Fitzroy', 'Lions'],
        'BB' => ['Brisbane', 'Bears'],
        'SM' => ['South Melbourne', 'Swans']
    ];

    protected static $aliases = [
        'crows' => 'AD',
        'adelaide' => 'AD',
        'brissy' => 'BL',
        'brisbane' => 'BL',
        'brisbane lions' => 'BL',
        'lions' => 'BL',
        'blues' => 'CA',
        'carlton' => 'CA',
        'navy blues' => 'CA',
        'pies' => 'CW',
        'maggies' => 'CW',
        'collingwood' => 'CW',
        'magpies' => 'CW',
        'dons' => 'ES',
        'bombers' => 'ES',
        'essendon' => 'ES',
        'dockers' => 'FR',
        'freo' => 'FR',
        'fremantle' => 'FR',
        'gold coast' => 'GC',
        'suns' => 'GC',
        'cats' => 'GE',
        'geelong' => 'GE',
        'giants' => 'GW',
        'gw sydney' => 'GW',
        'greater western sydney' => 'GW',
        'gws' => 'GW',
        'hawthorn' => 'HW',
        'hawks' => 'HW',
        'dees' => 'ME',
        'demons' => 'ME',
        'melbourne' => 'ME',
        'melb' => 'ME',
        'roos' => 'NM',
        'north' => 'NM',
        'north melbourne' => 'NM',
        'kangaroos' => 'NM',
        'kangas' => 'NM',
        'port' => 'PA',
        'power' => 'PA',
        'port adelaide' => 'PA',
        'tigers' => 'RI',
        'tiges' => 'RI',
        'richmond' => 'RI',
        'saints' => 'SK',
        'st kilda' => 'SK',
        'swans' => 'SY',
        'sydney' => 'SY',
        'bulldogs' => 'WB',
        'doggies' => 'WB',
        'dogs' => 'WB',
        'western bulldogs' => 'WB',
        'footscray' => 'WB',
        'eagles' => 'WC',
        'west coast' => 'WC',
    
    
        // Historical teams
        'fitzroy' => 'FI',
        'brisbane bears' => 'BB',
        'bears' => 'BB',
        'bloods' => 'SM',
        'south melbourne' => 'SM',
        'university' => 'UN'
    ];

    private function __construct()
    {
        //
    }

    public static function resolve(string $team)
    {
        $name = trim($team);
        if (!isset(static::$short[strtoupper($name)])
            && !isset(static::$historical[strtoupper($name)])
        ) {
            $name = static::resolveAlias($name);
        }
        if (!$name) {
            var_dump($team);
            die();
            return false;
        } else {
            $result = static::$short[strtoupper($name)] ?? static::$historical[strtoupper($name)];
        }
        $result['teamId'] = $name;
        return $result;
    }

    protected static function resolveAlias(string $alias)
    {
        return static::$aliases[strtolower($alias)] ?? false;
    }
}
