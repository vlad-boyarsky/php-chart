<?php

header("Content-type:image/png");

use App\Chart\ChartCreator;

require __DIR__ . '/vendor/autoload.php';

$chart = new ChartCreator();

$chart->chartSpace();
$chart->chartColors();
$chart->chartBorders();
$chart->chartEmploy();
$chart->chartDraw();
