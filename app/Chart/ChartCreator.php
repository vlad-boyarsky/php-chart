<?php

class ChartCreator
{

    protected array $monthValues = [];

    protected float $spaceWidth = 800;
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

    public function setMonthValues($values): array
    {
        return $this->monthValues = $values;
    }

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

    public function chartEmploy(): void
    {
        $max_value = max($this->monthValues);
        $this->chartRatio = $this->chartHeight / $max_value;

        $this->chartHorizontalLines = 20;
        $this->chartHorizontalDstance = $this->chartHeight / $this->chartHorizontalLines;

        for ($i = 1; $i <= $this->chartHorizontalLines; $i++) {

            $y = $this->spaceHeight - $this->spaceBorders - $this->chartHorizontalDstance * $i;
            imageline($this->generatedChart, $this->spaceBorders, $y, $this->spaceWidth - $this->spaceBorders, $y, $this->lineColor);
            $v = intval($this->chartHorizontalDstance * $i / $this->chartRatio);
            imagestring($this->generatedChart, 10, 5, $y - 5, $v, $this->barColor);

        }
    }

    public function chartDraw(): void
    {
        $monthKey = [];
        $statisticsValue = [];
        for ($i = 0; $i < $this->chartBarCount; $i++) {

            $topTextPosition = $this->spaceBorders + $this->chartDistance + $i * ($this->chartDistance + $this->chartBarWidth);
            $bottomTextPosition = $topTextPosition + $this->chartBarWidth;
            $getBarHeightPosition = $this->spaceHeight - $this->spaceBorders;

            foreach ($this->monthValues as $key => $value) {
                $statisticsValue[] = $value;
                $monthKey[] = $key;
                $getBarHeight = $this->spaceBorders + $this->chartHeight - intval($statisticsValue[$i] * $this->chartRatio);
                imagestring($this->generatedChart, 10, $topTextPosition + 10, 20, $statisticsValue[$i], $this->barColor);
                imagestring($this->generatedChart, 10, $topTextPosition + 10, $this->spaceHeight - 30, $monthKey[$i], $this->barColor);
            }

            imagefilledrectangle($this->generatedChart, $topTextPosition, $getBarHeight, $bottomTextPosition, $getBarHeightPosition, $this->barColor);

        }

        imagepng($this->generatedChart);
    }

}
