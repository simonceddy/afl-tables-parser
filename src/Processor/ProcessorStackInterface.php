<?php
namespace AflParser\Processor;

use AflParser\Processor\Row\RowProcessorInterface;


interface ProcessorStackInterface
{
    public function addProcessor(RowProcessorInterface $processor, int $pos = null);

    public function addProcessors(array $processors);

    public function getProcessors(): array;
}
