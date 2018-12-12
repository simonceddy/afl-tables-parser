<?php
use Eddy\AflTables\Parse;

require __DIR__.'/vendor/autoload.php';

if (file_exists($path = __DIR__.'/data/2018_stats.txt')) {
    var_dump([$teams, $rosters, $players, $statlines] = Parse::seasonTxtFile(file_get_contents($path)));
}
