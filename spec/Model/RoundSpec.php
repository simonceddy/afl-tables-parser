<?php

namespace spec\Eddy\AflTables\Model;

use Eddy\Norm\Contract\Model;
use Eddy\AflTables\Model\Round;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RoundSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Round::class);
    }

        
    function it_is_a_valid_model()
    {
        $this->shouldHaveType(Model::class);
    }

    function it_can_be_constructed_from_state()
    {
        $state = [
            'number' => 12
        ];
        $this->beConstructedWith($state);
        $this->get('number')->shouldReturn(12);
    }
}
