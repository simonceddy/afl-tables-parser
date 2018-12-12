<?php
use Eddy\AflTables\Parse;

require __DIR__.'/vendor/autoload.php';

if (file_exists($path = __DIR__.'/data/2018_stats.txt')) {
    $result = Parse::seasonTxtFile(
        file_get_contents($path)
    );
    var_dump(json_encode($result));
}
