<?php

namespace ArielMejiaDev\LarapexCharts\Traits;

trait ComplexChartDataAggregator
{
    public function addData(string $name, array $data, string $type = null) :self
    {
        $this->dataset = json_decode($this->dataset);

        $newData =  [
            'name' => $name,
            'data' => $data
        ];

        if ($type)
            $newData['type'] = $type;

        $this->dataset[] = $newData;

        $this->dataset = json_encode($this->dataset);

        return $this;
    }
}
