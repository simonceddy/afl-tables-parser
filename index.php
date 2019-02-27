<?php
use AflParser\SeasonTxtParser;
require __DIR__.'/vendor/autoload.php';

if (file_exists($path = __DIR__.'/data/2018_stats.txt')) {
    $result = (new SeasonTxtParser)->parse(file_get_contents($path));

    dd($result);
}
