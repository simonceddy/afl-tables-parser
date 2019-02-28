<?php
namespace AflParser\Support\Traits;

use AflParser\Processor\Row\RowProcessorInterface;

trait ProcessesRows
{
    protected $processors = [];

    public function addProcessor(RowProcessorInterface $processor, int $pos = null)
    {
        if ($pos) {
            // handle position in stack
            
        } else {
            $this->processors[] = $processor;
        }
        return $this;
    }

    public function addProcessors(array $processors)
    {
        foreach ($processors as $processor) {
            $this->addProcessor($processor);
        }
        return $this;
    }

    public function getProcessors(): array
    {
        return $this->processors;
    }
}
