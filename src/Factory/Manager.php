<?php
namespace Eddy\AflTables\Factory;

use Eddy\AflTables\Contract\FactoryManager;
use Eddy\AflTables\Support\HasFactoryArray;

class Manager implements FactoryManager
{
    use HasFactoryArray;

    protected $allowed_factories = [
        'player', 'team', 'match', 'statline'
    ];

    public function __construct(array $factories = [])
    {
        $this->initFactories($factories);
    }

    private function initFactories(array $factories)
    {
        isset($factories['player']) ?: $factories['player'] = new PlayerFactory;
        isset($factories['team']) ?: $factories['team'] = new TeamFactory;
        isset($factories['statline']) ?: $factories['statline'] = new StatlineFactory;
        isset($factories['match']) ?: $factories['match'] = new MatchFactory;
        $this->addFactories($factories);
    }
}
