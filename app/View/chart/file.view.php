<?php

header("Content-type:image/png");

require '../../../app/Chart/ChartCreator.php';

$fileValues = explode("\n", file_get_contents('date.txt'));

$monthValues = [
    "Jan" => 0,
    "Feb" => 0,
    "Mar" => 0,
    "Apr" => 0,
    "May" => 0,
    "Jun" => 0,
    "Jul" => 0,
    "Aug" => 0,
    "Sep" => 0,
    "Oct" => 0,
    "Nov" => 0,
    "Dec" => 0,
];

$count = -1;
foreach ($monthValues as &$monthValue){
    $count++;
    $monthValue = intval($fileValues[$count]);
}

$chart = new ChartCreator();
$chart->setMonthValues($monthValues);
$chart->chartSpace();
$chart->chartColors();
$chart->chartBorders();
$chart->chartEmploy();
$chart->chartDraw();