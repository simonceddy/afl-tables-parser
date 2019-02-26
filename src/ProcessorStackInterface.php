<?php
namespace AflParser;

use AflParser\Processor\ProcessorInterface;


interface ProcessorStackInterface
{
    public function addProcessor(ProcessorInterface $processor, int $pos = null);

    public function addProcessors(array $processors);

    public function getProcessors(): array;
}
