<?php

namespace spec\Eddy\AflTables\Model;

use Eddy\AflTables\Contract\Model;
use Eddy\AflTables\Model\Statline;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StatlineSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Statline::class);
    }

    function it_is_a_valid_model()
    {
        $this->shouldHaveType(Model::class);
    }

    function it_can_be_constructed_from_state()
    {
        $state = [
            'kicks' => 12,
        ];
        $this->beConstructedWith($state);
        $this->get('kicks')->shouldReturn(12);
    }
}
