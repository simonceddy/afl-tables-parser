<?php

namespace spec\Eddy\AflTables\Factory;

use Eddy\AflTables\Factory\Manager;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Eddy\AflTables\Factory\PlayerFactory;

class ManagerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Manager::class);
    }

    function it_loads_default_factories()
    {
        $this->factory('player')->shouldBeAnInstanceOf(PlayerFactory::class);
    }
}
