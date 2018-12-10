<?php

namespace spec\Eddy\AflTables\Model;

use Eddy\AflTables\Model\Statline;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StatlineSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Statline::class);
    }
}
