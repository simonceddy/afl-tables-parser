<?php

namespace spec\Eddy\AflTables\Model;

use Eddy\AflTables\Model\Team;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TeamSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Team::class);
    }
}
