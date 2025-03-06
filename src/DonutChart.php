<?php

namespace marineusde\LarapexCharts;


use marineusde\LarapexCharts\Contracts\MustAddSimpleData;
use marineusde\LarapexCharts\Traits\SimpleChartDataAggregator;

class DonutChart extends LarapexChart implements MustAddSimpleData
{
    use SimpleChartDataAggregator;

    public function __construct()
    {
        parent::__construct();
        $this->type = 'donut';
    }

    public function addPieces(array $data) :DonutChart
    {
        $this->addData($data);
        return $this;
    }
}
