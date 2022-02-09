<?php

namespace ArielMejiaDev\LarapexCharts\Facades;

use ArielMejiaDev\LarapexChart\LarapexChart;

class LarapexChart extends Facade
{

    protected static function getFacadeAccessor()
    {
        return LarapexChart::class;
    }

}
