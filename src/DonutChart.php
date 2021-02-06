<?php

namespace ArielMejiaDev\LarapexCharts;


use ArielMejiaDev\LarapexCharts\Contracts\MustAddSimpleData;
use ArielMejiaDev\LarapexCharts\Traits\SimpleChartDataAggregator;

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