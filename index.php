<?php
use AflParser\Parse;
require __DIR__.'/vendor/autoload.php';

if (file_exists($path = __DIR__.'/data/2018_stats.txt')) {
    $result = Parse::seasonTxt(file_get_contents($path));

    dd($result);
}
