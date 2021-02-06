<?php


namespace ArielMejiaDev\LarapexCharts;


use ArielMejiaDev\LarapexCharts\Contracts\MustAddComplexData;
use ArielMejiaDev\LarapexCharts\Traits\ComplexChartDataAggregator;

class HorizontalBar extends LarapexChart implements MustAddComplexData
{
    use ComplexChartDataAggregator;

    public function __construct()
    {
        parent::__construct();
        $this->type = 'bar';
        $this->horizontal = json_encode(['horizontal' => true]);
    }

    public function addBar(string $name, array $data) :HorizontalBar
    {
        return $this->addData($name, $data);
    }
}