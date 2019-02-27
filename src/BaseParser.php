<?php
namespace AflParser;

use AflParser\Support\Traits\HasProcessorStack;
use AflParser\Mappings\MappingsInterface;
use AflParser\Payload\Payload;

abstract class BaseParser implements ParserInterface, ProcessorStackInterface
{
    use HasProcessorStack;

    /**
     * Column name mappings.
     *
     * @var MappingsInterface
     */
    protected $mappings;

    /**
     * The Processor object
     *
     * @var Processor
     */
    protected $processor;

    abstract public function parse(string $source);

    /**
     * Create a new Parser.
     * 
     * Extending classes can pass their specific mappings to parent::__construct
     *
     * Mappings can be set after construction via the setMappings() method.
     * 
     * @param MappingsInterface $mappings
     */
    public function __construct(MappingsInterface $mappings = null)
    {
        !$mappings ?: $this->setMappings($mappings);
    }

    /**
     * Returns the column mappings for the parser.
     *
     * @return array
     */
    public function mappings()
    {
        return $this->mappings->mappings();
    }

    protected function process(array $row, Payload $payload)
    {
        isset(
            $this->processor
        ) ?: $this->processor = new Processor($this);
        return $this->processor->process($row, $payload);
    }

    /**
     * Get column name mappings.
     *
     * @return  MappingsInterface
     */ 
    public function getMappings()
    {
        return $this->mappings;
    }

    /**
     * Set column name mappings.
     *
     * @param  MappingsInterface  $mappings  Column name mappings.
     *
     * @return  self
     */ 
    public function setMappings(MappingsInterface $mappings)
    {
        $this->mappings = $mappings;

        return $this;
    }
}
