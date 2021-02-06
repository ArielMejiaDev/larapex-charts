<?php


namespace ArielMejiaDev\LarapexCharts\Traits;


use ArielMejiaDev\LarapexCharts\LarapexChart;

trait SimpleChartDataAggregator
{
    public function addData(array $data) :self
    {
        $this->dataset = $data;

        $this->dataset = json_encode($this->dataset);

        return $this;
    }
}