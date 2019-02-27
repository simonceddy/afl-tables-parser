<?php
namespace AflParser;

use AflParser\Util\Splitter;
use AflParser\Mappings\MappingsInterface;
use AflParser\Mappings\SeasonTxtMappings;
use AflParser\Payload\Payload;

class SeasonTxtParser extends BaseParser
{
    public function __construct(MappingsInterface $mappings = null)
    {
        parent::__construct($mappings ?? new SeasonTxtMappings ());
        $this->initDefaultProcessors();
    }
    
    private function initDefaultProcessors()
    {
        $this->addProcessors([
            new Processor\ProcessTeam(),
            new Processor\ProcessPlayer(),
            new Processor\AddToRoster(),
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
