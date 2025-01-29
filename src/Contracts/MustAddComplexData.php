<?php


namespace Dusanbre\LarapexCharts\Contracts;


interface MustAddComplexData
{
    public function addData(string $name, array $data);
}