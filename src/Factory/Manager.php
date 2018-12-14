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

    public function playerFactory()
    {
        if (!$this->factory('player')) {
            $this->addFactoryAs('player', new PlayerFactory);
        }
        return $this->factory('player');
    }

    public function teamFactory()
    {
        if (!$this->factory('team')) {
            $this->addFactoryAs('team', new TeamFactory);
        }
        return $this->factory('team');
    }

    public function matchFactory()
    {
        if (!$this->factory('match')) {
            $this->addFactoryAs('match', new MatchFactory);
        }
        return $this->factory('match');
    }

    public function statlineFactory()
    {
        if (!$this->factory('statline')) {
            $this->addFactoryAs('statline', new StatlineFactory);
        }
        return $this->factory('statline');
    }
}
