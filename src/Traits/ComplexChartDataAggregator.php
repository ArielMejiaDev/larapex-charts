<?php

namespace ArielMejiaDev\LarapexCharts\Traits;

trait ComplexChartDataAggregator
{
    public function addData(string $name, array $data) :self
    {
        $this->dataset = json_decode($this->dataset);

        $this->dataset[] = [
            'name' => $name,
            'data' => $data
        ];

        $this->dataset = json_encode($this->dataset);

        return $this;
    }
}