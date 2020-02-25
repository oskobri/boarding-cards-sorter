<?php

use App\Services\BoardingCardSorter;
require __DIR__ . '/vendor/autoload.php';

$sample = json_decode(file_get_contents('app/samples/sample.json'), true);

(new BoardingCardSorter())->load($sample)->journey();
