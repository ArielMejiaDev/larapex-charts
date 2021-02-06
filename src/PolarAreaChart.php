<?php

namespace ArielMejiaDev\LarapexCharts;


use ArielMejiaDev\LarapexCharts\Contracts\MustAddSimpleData;
use ArielMejiaDev\LarapexCharts\Traits\SimpleChartDataAggregator;

class PolarAreaChart extends LarapexChart implements MustAddSimpleData
{
    use SimpleChartDataAggregator;

    public function __construct()
    {
        parent::__construct();
        $this->type = 'polarArea';
    }

    public function addPolarAreas(array $data) :PolarAreaChart
    {
        $this->addData($data);
        return $this;
    }
}