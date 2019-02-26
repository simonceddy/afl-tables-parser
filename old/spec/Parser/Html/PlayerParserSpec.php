<?php

namespace spec\Eddy\AflTables\Parser\Html;

use Eddy\AflTables\Parser\Html\PlayerParser;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PlayerParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PlayerParser::class);
    }

    function it_accepts_a_string_and_returns_an_array()
    {
        $this->parse('')->shouldBeArray();
    }
}
