<?php

namespace spec\Eddy\AflTables\Model;

use Eddy\AflTables\Contract\Model;
use Eddy\AflTables\Model\Roster;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RosterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Roster::class);
    }

    function it_is_a_valid_model()
    {
        $this->shouldHaveType(Model::class);
    }

    function it_can_be_constructed_from_state()
    {
        $state = [
            'team' => 'RI',
            'season' => 2018
        ];
        $this->beConstructedWith($state);
        $this->get('season')->shouldReturn(2018);
    }
}
