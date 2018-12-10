<?php

namespace spec\Eddy\AflTables\Http;

use Eddy\AflTables\Http\Messenger;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use GuzzleHttp\ClientInterface;

class MessengerSpec extends ObjectBehavior
{
    function let(ClientInterface $client)
    {
        $this->beConstructedWith($client);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Messenger::class);
    }

    function it_has_a_guzzlehttp_client()
    {
        $this->client()->shouldBeAnInstanceOf(ClientInterface::class);
    }
}
