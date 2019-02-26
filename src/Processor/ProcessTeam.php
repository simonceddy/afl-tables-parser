<?php
namespace AflParser\Processor;

use AflParser\Payload;


class ProcessTeam implements ProcessorInterface
{
    public function process(
        array $row,
        Payload $payload,
        ProcessorInterface $next = null
    ) {
        return !$next ? [$row, $payload]: $next->process($row, $payload);
    }
}
