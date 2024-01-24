<?php

namespace ArielMejiaDev\LarapexCharts\Traits;

trait ComplexChartDataAggregator
{
    public function addData(string $name, array $data) :self
    {
        $dataset = json_decode($this->dataset);

        $dataset[] = [
            'name' => $name,
            'data' => $data
        ];

        $this->dataset = json_encode($dataset);

        return $this;
    }
}