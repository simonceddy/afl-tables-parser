<?php
use Eddy\AflTables\Parser\Txt\SeasonTxtFile;

require __DIR__.'/vendor/autoload.php';

$parser = new SeasonTxtFile();

if (file_exists($path = __DIR__.'/data/2018_stats.txt')) {
    $data = file_get_contents($path);
    $result = $parser->parse($data);
}
