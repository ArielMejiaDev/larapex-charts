<?php


namespace ArielMejiaDev\LarapexCharts\Contracts;


interface MustAddComplexData
{
    public function addData(array $data, ?string $name = '') :self;
}