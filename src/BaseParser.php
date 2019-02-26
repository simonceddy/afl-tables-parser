<?php
namespace AflParser;

use AflParser\Support\ColumnMap\ColumnMapInterface;
use AflParser\Support\Traits\HasProcessorStack;

abstract class BaseParser implements ParserInterface, ProcessorStackInterface
{
    use HasProcessorStack;

    /**
     * Column name mappings.
     *
     * @var ColumnMapInterface
     */
    protected $mappings;

    abstract public function parse(string $source);

    /**
     * Create a new Parser.
     * 
     * Extending classes can pass their specific mappings to parent::__construct
     *
     * @param ColumnMapInterface $mappings
     */
    public function __construct(ColumnMapInterface $mappings)
    {
        $this->mappings = $mappings;
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

    protected function process()
    {

    }
}
