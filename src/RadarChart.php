<?php

namespace ArielMejiaDev\LarapexCharts;

use ArielMejiaDev\LarapexCharts\Contracts\MustAddComplexData;
use ArielMejiaDev\LarapexCharts\Traits\ComplexChartDataAggregator;

class RadarChart extends LarapexChart implements MustAddComplexData
{
    use ComplexChartDataAggregator;

    public function __construct()
    {
        parent::__construct();
        $this->type = 'radar';
    }

    public function addSerie(string $name, array $data) :RadarChart
    {
        return $this->addData($name, $data);
    }
}