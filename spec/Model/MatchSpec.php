<?php

namespace spec\Eddy\AflTables\Model;

use Eddy\AflTables\Model\Match;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MatchSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Match::class);
    }
}
