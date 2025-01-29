<?php


namespace Dusanbre\LarapexCharts\Traits;


use Dusanbre\LarapexCharts\LarapexChart;

trait SimpleChartDataAggregator
{
    public function addData(array $data) :self
    {
        $this->dataset = json_encode($data);

        return $this;
    }
}