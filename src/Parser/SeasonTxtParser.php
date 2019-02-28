<?php
namespace AflParser\Parser;

use AflParser\Util\Splitter;
use AflParser\Mappings\MappingsInterface;
use AflParser\Mappings\SeasonTxtMappings;
use AflParser\Payload\Payload;
use AflParser\Processor\Row;

class SeasonTxtParser extends BaseParser
{
    public const MAPPINGS = SeasonTxtMappings::class;

    public function __construct(MappingsInterface $mappings = null)
    {
        if (!$mappings) {
            $mappings = static::MAPPINGS;
            $mappings = new $mappings;
        }
        parent::__construct($mappings);
        $this->initDefaultProcessors();
    }
    
    private function initDefaultProcessors()
    {
        $this->addProcessors([
            new Row\ProcessTeam(),
            new Row\ProcessPlayer(),
            new Row\AddToRoster(),
        ]);
    }

    public function parse(string $source)
    {
        // split source into lines
        $lines = Splitter::splitLines($source);

        // remove headings from lines
        array_shift($lines);

        $result = [];

        $mappings = $this->mappings->mappings();

        $payload = new Payload();

        // process lines as CSV
        foreach ($lines as $line) {
            if (count($row = str_getcsv($line)) === count($mappings)) {
                $row = array_combine($mappings, $row);
                $this->process($row, $payload);
                $result[] = $row;
            }
        }
        
        return $payload;
    }
}
