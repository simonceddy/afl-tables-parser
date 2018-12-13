<?php

namespace spec\Eddy\AflTables\Model;

use Eddy\AflTables\Contract\Model;
use Eddy\AflTables\Model\Team;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TeamSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Team::class);
    }


    function it_is_a_valid_model()
    {
        $this->shouldHaveType(Model::class);
    }

    function it_can_be_constructed_from_state()
    {
        $state = [
            'name' => 'Jones',
            'city' => 'Nathan'
        ];
        $this->beConstructedWith($state);
        $this->get('name')->shouldReturn('Jones');
    }
}
