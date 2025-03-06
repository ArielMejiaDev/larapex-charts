<?php

namespace marineusde\LarapexCharts;


use marineusde\LarapexCharts\Contracts\MustAddComplexData;
use marineusde\LarapexCharts\Traits\ComplexChartDataAggregator;

class LineChart extends LarapexChart implements MustAddComplexData
{
    use ComplexChartDataAggregator;

    public function __construct()
    {
        parent::__construct();
        $this->type = 'line';
    }

    public function addLine(string $name, array $data) :LineChart
    {
        return $this->addData($name, $data);
    }
}
