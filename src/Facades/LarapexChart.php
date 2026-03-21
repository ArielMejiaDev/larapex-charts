<?php

namespace ArielMejiaDev\LarapexCharts\Facades;

use Illuminate\Support\Facades\Facade;

class LarapexChart extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'larapex-chart';
    }
}
