<?php

namespace spec\Eddy\AflTables\Util\Stat;

use Eddy\AflTables\Util\Stat\Analyser;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AnalyserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Analyser::class);
    }
}
