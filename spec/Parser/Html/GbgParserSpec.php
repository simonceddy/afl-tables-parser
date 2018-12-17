<?php

namespace spec\Eddy\AflTables\Parser\Html;

use Eddy\AflTables\Parser\Html\GbgParser;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GbgParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(GbgParser::class);
    }

    function it_accepts_a_string_and_returns_an_array()
    {
        $this->parse('')->shouldBeArray();
    }
}
