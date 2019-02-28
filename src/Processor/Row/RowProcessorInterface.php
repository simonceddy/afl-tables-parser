<?php
namespace AflParser\Processor\Row;

use AflParser\Payload\Payload;

interface RowProcessorInterface
{
    public function process(array $row, Payload $payload);
}
