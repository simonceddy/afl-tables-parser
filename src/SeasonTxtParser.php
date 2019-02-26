<?php
namespace AflParser;

use AflParser\Util\Splitter;
use AflParser\Support\ColumnMap\ColumnMapInterface;
use AflParser\Support\ColumnMap\SeasonTxtMap;
use AflParser\Processor\ProcessTeam;

class SeasonTxtParser extends BaseParser
{
    public function __construct(ColumnMapInterface $mappings = null)
    {
        parent::__construct($mappings ?? new SeasonTxtMap());
        $this->initDefaultProcessors();
    }
    
    private function initDefaultProcessors()
    {
        $this->addProcessors([
            new ProcessTeam(),
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

        // process lines as CSV
        foreach ($lines as $line) {
            if (count($row = str_getcsv($line)) === count($mappings)) {
                $result[] = array_combine($mappings, $row);
            }
        }
        
        return $result;
    }
}
