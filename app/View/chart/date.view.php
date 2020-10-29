<?php

header("Content-type:image/png");

require '../../../app/Chart/ChartCreator.php';

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

$chart = new ChartCreator();
$chart->setMonthValues($montValues);
$chart->chartSpace();
$chart->chartColors();
$chart->chartBorders();
$chart->chartEmploy();
$chart->chartDraw();

?>