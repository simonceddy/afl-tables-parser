<?php
namespace AflParser\Processor;

use AflParser\Payload\Payload;


class ProcessTeam implements ProcessorInterface
{
    public function process(array $row,Payload $payload)
    {
        if (!isset($payload->teams[$row['Team']])) {
            $payload->teams[$row['Team']] = [
                'name' => $row['Team']
            ];
        }
        return [$row, $payload];
    }
}
