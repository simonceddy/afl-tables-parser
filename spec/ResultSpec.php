<?php

namespace spec\Eddy\AflTables;

use Eddy\AflTables\Result;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ResultSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Result::class);
    }
}
