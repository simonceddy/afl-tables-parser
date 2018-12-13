<?php

namespace spec\Eddy\AflTables\Model;

use Eddy\AflTables\Contract\Model;
use Eddy\AflTables\Model\Player;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PlayerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Player::class);
    }

    function it_is_a_valid_model()
    {
        $this->shouldHaveType(Model::class);
    }

    function it_can_be_constructed_from_state()
    {
        $state = [
            'surname' => 'Jones',
            'first_name' => 'Nathan'
        ];
        $this->beConstructedWith($state);
        $this->get('surname')->shouldReturn('Jones');
    }
}
