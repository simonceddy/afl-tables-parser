<?php

namespace spec\Eddy\AflTables\Model;

use Eddy\AflTables\Model\Player;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PlayerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Player::class);
    }
}
