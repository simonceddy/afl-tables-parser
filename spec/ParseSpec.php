<?php

namespace spec\Eddy\AflTables;

use Eddy\AflTables\Parse;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AppSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Parse::class);
    }
}
