<?php
namespace AflParser;

use AflParser\Payload\Payload;

class Processor
{
    protected $stack;

    public function __construct(ProcessorStackInterface $stack)
    {
        $this->stack = $stack->getProcessors();
    }

    public function process(array $row, Payload $payload)
    {
        foreach ($this->stack as $processor) {
            [$row, $payload] = $processor->process($row, $payload);
        }
        return $payload;
    }
}
