<?php

namespace spec\Eddy\AflTables\Model;

use Eddy\Norm\Contract\Model;
use Eddy\AflTables\Model\Season;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SeasonSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Season::class);
    }

        
    function it_is_a_valid_model()
    {
        $this->shouldHaveType(Model::class);
    }

    function it_can_be_constructed_from_state()
    {
        $state = [
            'year' => 1927
        ];
        $this->beConstructedWith($state);
        $this->get('year')->shouldReturn(1927);
    }
}
