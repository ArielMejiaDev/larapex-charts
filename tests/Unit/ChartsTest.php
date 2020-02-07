<?php namespace ArielMejiaDev\LarapexCharts\Tests\Unit;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use ArielMejiaDev\LarapexCharts\Tests\TestCase;

class ChartsTest extends TestCase
{


    /** @test */
    public function larapex_can_render_area_charts()
    {
        $this->withoutExceptionHandling();

        $chart = (new LarapexChart)->setTitle('Users');

        $this->assertEquals('donut', $chart->type());
    }

    /** @test */
    public function larapex_can_change_default_config_colors()
    {
        $chart = (new LarapexChart)->setTitle('Posts')->setXAxis(['Jan', 'Feb', 'Mar'])->setDataset([150, 120]);
        $oldColors = $chart->colors();
        $chart->setColors(['#fe9700', '#607c8a']);
        $this->assertNotEquals($oldColors, $chart->colors());
    }

    /** @test */
    public function larapex_cdn_returns_a_correct_url()
    {
        $this->assertEquals('https://cdn.jsdelivr.net/npm/apexcharts' , (new LarapexChart)->cdn());
    }

}