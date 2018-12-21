<?php

namespace spec\Eddy\AflTables\Model;

use Eddy\Norm\Contract\Model;
use Eddy\AflTables\Model\Match;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MatchSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Match::class);
    }

    function it_is_a_valid_model()
    {
        $this->shouldHaveType(Model::class);
    }

    function it_can_be_constructed_from_state()
    {
        $state = [
            'round' => 1,
            'season' => 1978
        ];
        $this->beConstructedWith($state);
        $this->get('round')->shouldReturn(1);
    }
}
