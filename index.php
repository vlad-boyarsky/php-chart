<?php

header("Content-type:image/png");

use App\Chart\ChartCreator;

require __DIR__ . '/vendor/autoload.php';

$chart = new ChartCreator();

$montValues = [
    "Jan" => 0 ,
    "Feb" => 33,
    "Mar" => 35,
    "Apr" => 31,
    "May" => 41,
    "Jun" => 41,
    "Jul" => 42,
    "Aug" => 27,
    "Sep" => 45,
    "Oct" => 28,
    "Nov" => 55,
    "Dec" => 20,
];

$chart->setMonthValues($montValues);
$chart->chartSpace();
$chart->chartColors();
$chart->chartBorders();
$chart->chartEmploy();
$chart->chartDraw();
