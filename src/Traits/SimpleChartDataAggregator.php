<?php

namespace ArielMejiaDev\LarapexCharts\Traits;

trait SimpleChartDataAggregator
{
    public function addData(array $data): self
    {
        $this->dataset = json_encode($data);

        return $this;
    }
}
