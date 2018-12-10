<?php
namespace Eddy\AflTables\Parser\Txt;

use Eddy\AflTables\Contract\Parser;
use Eddy\AflTables\Util\Splitter;

class SeasonTxtFile implements Parser
{
    public function parse(string $input): array
    {
        $input = Splitter::splitLines($input);
        // remove headings
        array_shift($input);
        $result = [];
        $i = 1;
        foreach ($input as $line) {
            $line = Splitter::splitMultiWhitespace($line);
            var_dump($line);
            if (25 < $i) {
                die();
            }
            $i++;
        }

        return [];
    }

    protected function parseLine(string $line)
    {

    }
}
