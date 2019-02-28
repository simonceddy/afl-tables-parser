<?php
namespace AflParser\Processor\Row;

use AflParser\Payload\Payload;

class ProcessPlayer implements RowProcessorInterface
{
    public function process(array $row, Payload $payload)
    {
        if (!isset($payload->players[$player = $row['ID']])) {
            $payload->players[$row['ID']] = [
                'ID' => $row['ID'],
                'name' => $row['Player']
            ];
        }
        dd($payload->players);
        if (!isset($payload->rosters[$team]['players'][$row['ID']])) {
            $payload->rosters[$team]['players'][$row['ID']] = [];
        }
        return [$row, $payload];
    }
}
