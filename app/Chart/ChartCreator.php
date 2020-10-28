<?php


namespace App\Chart;

class ChartCreator
{

    protected array $monthValues = [
        "Jan" => 31,
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

    protected float $spaceWidth = 1245;
    protected float $spaceHeight = 600;
    protected float $spaceBorders = 40;

    protected $generatedChart;

    protected $barColor;
    protected $backgroundColor;
    protected $borderColor;
    protected $lineColor;

    protected float $chartWidth;
    protected float $chartHeight;

    protected float $chartBarCount;
    protected float $chartRatio;
    protected float $chartDistance;
    protected float $chartBarWidth = 40;
    protected float $chartHorizontalLines;
    protected float $chartHorizontalDstance;

    public function chartSpace(): void
    {

        $this->chartWidth = $this->spaceWidth - $this->spaceBorders * 2;
        $this->chartHeight = $this->spaceHeight - $this->spaceBorders * 2;
        $this->generatedChart = imagecreate($this->spaceWidth, $this->spaceHeight);

        $this->chartBarCount = count($this->monthValues);
        $this->chartDistance = ($this->chartWidth - $this->chartBarCount * $this->chartBarWidth) / ($this->chartBarCount + 1);

    }
    
}