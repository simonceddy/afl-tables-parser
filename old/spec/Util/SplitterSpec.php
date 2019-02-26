<?php

namespace spec\Eddy\AflTables\Util;

use Eddy\AflTables\Util\Splitter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SplitterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Splitter::class);
    }

    
}
