<?php
namespace AflParser\Processor\Row;

use AflParser\Payload\Payload;
use AflParser\Support\Models\Player;

class ProcessPlayer implements RowProcessorInterface
{
    public function process(array $row, Payload $payload)
    {
        if (!isset($payload->players[$player = $row['ID']])) {
            $names = preg_split('/\s/', $row['Player'], 2, PREG_SPLIT_NO_EMPTY);
            $payload->players[$row['ID']] = new Player([
                'ID' => $player,
                'surname' => $names[1],
                'given_name' => $names[0]
            ]);
        }

        dd($payload->players);
        
        return [$row, $payload];
    }
}
