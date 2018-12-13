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

    function it_accepts_string_to_be_parsed_and_returns_arrays_of_successful_results()
    {
        $this->parse('sasfafasfasfa')->shouldHaveKeyWithValue('players', []);
    }
}
