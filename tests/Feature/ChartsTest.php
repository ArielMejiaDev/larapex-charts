<?php namespace ArielMejiaDev\LarapexCharts\Tests\Feature;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use ArielMejiaDev\LarapexCharts\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChartsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_tests_larapex_charts_can_render_pie_charts_by_default(): void
    {
        $chart = (new LarapexChart)->setTitle('Users Test Chart');
        $this->assertEquals('donut', $chart->type());
        $anotherChart = (new LarapexChart)->areaChart();
        $this->assertEquals('area', $anotherChart->type());
    }

    /** @test */
    public function it_tests_larapex_charts_can_render_pie_chart(): void
    {
        $chart = (new LarapexChart)->pieChart()
            ->setTitle('Posts')
            ->setSubtitle('From January To March')
            ->setLabels(['Product One', 'Product Two', 'Product Three'])
            ->setXAxis(['Jan', 'Feb', 'Mar'])
            ->setDataset([150, 120]);

        $this->assertEquals($chart, $chart->script()['chart']);
        $this->assertEquals('pie', $chart->type());
    }

    /** @test */
    public function it_tests_larapex_charts_can_render_donut_chart(): void
    {
        $chart = (new LarapexChart)->donutChart()
            ->setTitle('Posts')
            ->setXAxis(['Jan', 'Feb', 'Mar'])
            ->setDataset([150, 120]);

        $this->assertEquals($chart, $chart->script()['chart']);
        $this->assertEquals('donut', $chart->type());
    }

    /** @test */
    public function it_tests_larapex_can_render_radial_bar_charts(): void
    {
        $chart = (new LarapexChart)->radialChart()
            ->setTitle('Products with more profit')
            ->setXAxis(['Jan', 'Feb', 'Mar'])
            ->setDataset([60, 40, 79]);

        $this->assertEquals($chart, $chart->script()['chart']);
        $this->assertEquals('radialBar', $chart->type());
    }

    /** @test */
    public function it_tests_larapex_charts_can_render_polar_chart(): void
    {
        $chart = (new LarapexChart)->polarAreaChart()
            ->setTitle('Products with more profit')
            ->setXAxis(['Jan', 'Feb', 'Mar'])
            ->setDataset([60, 40, 79]);

        $this->assertEquals($chart, $chart->script()['chart']);
        $this->assertEquals('polarArea', $chart->type());
    }

    /** @test */
    public function larapex_can_render_line_charts(): void
    {
        $chart = (new LarapexChart)->lineChart()
            ->setTitle('Total Users Monthly')
            ->setSubtitle('From January to March')
            ->setXAxis([
                'Jan', 'Feb', 'Mar'
            ])
            ->setDataset([
                [
                    'name'  =>  'Active Users',
                    'data'  =>  [250, 700, 1200]
                ]
            ])
            ->setHeight(250)
            ->setGrid(true)
            ->setStroke(1);

        $this->assertEquals($chart->id(), $chart->container()['id']);
        $this->assertEquals($chart, $chart->script()['chart']);
        $this->assertEquals('line', $chart->type());
    }

    /** @test */
    public function it_tests_larapex_charts_can_create_an_area_chart(): void
    {
        $chart = (new LarapexChart)->areaChart()
            ->setTitle('Total Users Monthly')
            ->setSubtitle('From January to March')
            ->setXAxis([
                'Jan', 'Feb', 'Mar'
            ])
            ->setDataset([
                [
                    'name'  =>  'Active Users',
                    'data'  =>  [250, 700, 1200]
                ],
                [
                    'name'  =>  'New Users',
                    'data'  =>  [1000, 1124, 2000]
                ]
            ]);

        $this->assertEquals($chart->id(), $chart->container()['id']);
        $this->assertEquals($chart, $chart->script()['chart']);
        $this->assertEquals('area', $chart->type());
    }

    /** @test */
    public function it_tests_larapex_charts_can_render_bar_charts(): void
    {
        $chart = (new LarapexChart)->barChart()
            ->setTitle('Net Profit')
            ->setXAxis(['Jan', 'Feb', 'Mar'])
            ->setDataset([
                [
                    'name'  => 'Company A',
                    'data'  =>  [500, 1000, 1900]
                ],
                [
                    'name'  => 'Company B',
                    'data'  => [300, 900, 1400]
                ],
                [
                    'name'  => 'Company C',
                    'data'  => [430, 245, 500]
                ],
                [
                    'name'  => 'Company D',
                    'data'  => [200, 245, 700]
                ],
                [
                    'name'  => 'Company E',
                    'data'  => [120, 45, 610]
                ],
                [
                    'name'  => 'Company F',
                    'data'  => [420, 280, 400]
                ]
            ]);

        $this->assertEquals($chart->id(), $chart->container()['id']);
        $this->assertEquals($chart, $chart->script()['chart']);
        $this->assertEquals('bar', $chart->type());
    }

    /** @test */
    public function it_tests_larapex_charts_can_render_stacked_bar_chart(): void
    {
        $chart = (new LarapexChart)->barChart()
            ->setTitle('Net Profit')
            ->setStacked(true)
            ->setXAxis(['Jan', 'Feb', 'Mar'])
            ->setDataset([
                [
                    'name' => 'Company A',
                    'data' => [500, 1000, 1900]
                ],
                [
                    'name' => 'Company B',
                    'data' => [300, 800, 1400]
                ],
                [
                    'name' => 'Company C',
                    'data' => [304, 231, 500]
                ]
            ]);

        $this->assertEquals($chart->id(), $chart->container()['id']);
        $this->assertEquals($chart, $chart->script()['chart']);
        $this->assertEquals('bar', $chart->type());
        $this->assertTrue($chart->stacked());
    }

    /** @test */
    public function it_tests_larapex_charts_can_render_horizontal_bar_chart(): void
    {
        $chart = (new LarapexChart)->barChart()
            ->setTitle('Net Profit')
            ->setHorizontal(true)
            ->setXAxis(['Jan', 'Feb', 'Mar'])
            ->setDataset([
                [
                    'name'  => 'Company A',
                    'data'  =>  [500, 1000, 1900]
                ],
                [
                    'name'  => 'Company B',
                    'data'  => [300, 900, 1400]
                ],
                [
                    'name'  => 'Company C',
                    'data'  => [430, 245, 500]
                ]
            ]);

        $this->assertEquals($chart->id(), $chart->container()['id']);
        $this->assertEquals($chart, $chart->script()['chart']);
        $this->assertEquals('bar', $chart->type());
        $chartHorizontalOrientation = json_decode($chart->horizontal(), 1)['horizontal'];
        $this->assertTrue($chartHorizontalOrientation);
    }

    /** @test */
    public function it_tests_larapex_charts_can_render_heatmap_chart(): void
    {
        $chart = (new LarapexChart)->heatMapChart()
            ->setTitle('Total Users')
            ->setXAxis([
                'Jan', 'Feb', 'Mar'
            ])
            ->setDataset([
                [
                    'name'  =>  'Users of Basic Plan',
                    'data'  =>  [250, 700, 1200]
                ],
                [
                    'name'  =>  'Users of Premium Plan',
                    'data'  =>  [1000, 1124, 2000]
                ]
            ]);

        $this->assertEquals($chart->id(), $chart->container()['id']);
        $this->assertEquals($chart, $chart->script()['chart']);
        $this->assertEquals('heatmap', $chart->type());
    }
    
    /** @test */
    public function it_tests_larapex_charts_can_render_radar_chart(): void
    {
        $chart = (new LarapexChart)->radarChart()
            ->setTitle('Total Users')
            ->setXAxis([
                'Jan', 'Feb', 'Mar'
            ])
            ->setDataset([
                [
                    'name'  =>  'Users of Basic Plan',
                    'data'  =>  [250, 700, 1200]
                ],
                [
                    'name'  =>  'Users of Premium Plan',
                    'data'  =>  [1000, 1124, 2000]
                ]
            ]);

        $this->assertEquals($chart->id(), $chart->container()['id']);
        $this->assertEquals($chart, $chart->script()['chart']);
        $this->assertEquals('radar', $chart->type());
    }
}
