<?php
namespace AflParser\Processor;

use AflParser\Payload\Payload;

interface ProcessorInterface
{
    public function process(
        array $row,
        Payload $payload,
        ProcessorInterface $next = null
    );
}
