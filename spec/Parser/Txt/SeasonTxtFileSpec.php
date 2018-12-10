<?php

namespace spec\Eddy\AflTables\Parser\Txt;

use Eddy\AflTables\Parser\Txt\SeasonTxtFile;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SeasonTxtFileSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(SeasonTxtFile::class);
    }
}
