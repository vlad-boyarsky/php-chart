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

    public function chartColors(): void
    {

        $this->backgroundColor = imagecolorallocate($this->generatedChart, 255, 255, 255);
        $this->borderColor = imagecolorallocate($this->generatedChart, 66, 63, 62);
        $this->lineColor = imagecolorallocate($this->generatedChart, 0, 0, 0);
        $this->barColor = imagecolorallocate($this->generatedChart, 225, 96, 86);

    }

    public function chartBorders(): void
    {

        imagefilledrectangle($this->generatedChart, 1, 1, $this->spaceWidth - 2, $this->spaceHeight - 2, $this->borderColor);
        imagefilledrectangle($this->generatedChart, $this->spaceBorders, $this->spaceBorders, $this->spaceWidth - 1 - $this->spaceBorders, $this->spaceHeight - 1 - $this->spaceBorders, $this->backgroundColor);

    }



}