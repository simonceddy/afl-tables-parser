<?php

namespace spec\Eddy\AflTables\Model;

use Eddy\Norm\Contract\Model;
use Eddy\AflTables\Model\Statline;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StatlineSpec extends ObjectBehavior
{
    function let()
    {
        $state = [
            'kicks' => 12
        ];
        $this->beConstructedWith($state);
    }

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
            'kicks' => 28
        ];
        $this->beConstructedWith($state);
        $this->get('kicks')->shouldReturn(28);
    }

    function it_can_get_values_for_attributes_using_magic_get()
    {
        $this->kicks->shouldBeEqualTo(12);
    }

    function it_can_set_values_for_attributes_using_magic_set()
    {
        $this->handballs = 11;
        $this->handballs->shouldBeEqualTo(11);
    }
}
