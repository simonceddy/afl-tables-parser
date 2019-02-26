<?php
namespace Eddy\AflTables\Http;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class Messenger
{
    protected $client;

    public function __construct(ClientInterface $client = null)
    {
        $this->client = $client ?? new Client(
            // default config
        );
    }

    public function client()
    {
        return $this->client;
    }
}
