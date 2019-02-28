<?php
namespace AflParser\Processor\Row;

use AflParser\Payload\Payload;

class AddToRoster implements RowProcessorInterface
{
    public function process(array $row, Payload $payload)
    {
        if (!isset($payload->rosters[$team = $row['Team']])) {
            $payload->rosters[$row['Team']] = [
                'team' => $row['Team'],
                'players' => []
            ];
        }
        if (!isset($payload->rosters[$team]['players'][$row['ID']])) {
            $payload->rosters[$team]['players'][$row['ID']] = [];
        }
        return [$row, $payload];
    }
}
