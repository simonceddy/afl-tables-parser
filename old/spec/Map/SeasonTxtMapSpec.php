<?php

namespace spec\Eddy\AflTables\Map;

use Eddy\AflTables\Map\SeasonTxtMap;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SeasonTxtMapSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(SeasonTxtMap::class);
    }
}
