<?php
namespace Eddy\AflTables;

use Eddy\AflTables\Parser\Txt\SeasonTxtFile;


/**
 * The Parse class acts as the entry point to the library's various parsers
 * and utilities.
 * 
 * You are not required to use this class to create or use a parser. It simply
 * provides convenience methods for common or potentially useful parsing
 * operations.
 */
class Parse
{
    public static function seasonTxtFile(string $contents, array $options = [])
    {
        $parser = new SeasonTxtFile(
            $options['map'] ?? null,
            [$options['factory'] ?? null]
        );
        return $parser->parse($contents);
    }
}
