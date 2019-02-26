<?php

namespace spec\Eddy\FootyParser\Factory;

use Eddy\FootyParser\Factory\SeasonFactory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SeasonFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(SeasonFactory::class);
    }

    function it_creates_a_new_season()
    {
        $this->build(['season' => 2018, 'rounds' => []])
            ->shouldHaveKey('season');
    }
}
