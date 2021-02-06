<?php

namespace ArielMejiaDev\LarapexCharts;


use ArielMejiaDev\LarapexCharts\Contracts\MustAddSimpleData;
use ArielMejiaDev\LarapexCharts\Traits\SimpleChartDataAggregator;

class RadialChart extends LarapexChart implements MustAddSimpleData
{
    use SimpleChartDataAggregator;

    public function __construct()
    {
        parent::__construct();
        $this->type = 'radialBar';
    }

    public function addRings(array $data) :RadialChart
    {
        $this->addData($data);
        return $this;
    }
}