<?php namespace ArielMejiaDev\LarapexCharts\Tests\Features;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use ArielMejiaDev\LarapexCharts\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChartsTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function larapex_can_render_pie_charts_by_default()
    {
        $this->withoutExceptionHandling();
        $chart = (new LarapexChart)->setTitle('Users Test Chart');
        $this->assertEquals('donut', $chart->type());
        $chart->setType('area');
        $this->assertEquals('area', $chart->type());
    }

    /** @test */
    public function larapex_can_load_script_correctly()
    {
        $chart = (new LarapexChart)->setTitle('Posts')->setXAxis(['Jan', 'Feb', 'Mar'])->setDataset([150, 120])->setLabels([__('Published'), __('No Published')]);
        $this->assertEquals($chart->dataset(), $chart->script()['chart']->dataset());
    }

    /** @test */
    public function larapex_can_create_an_area_chart()
    {
        $chart = (new LarapexChart)->setType('area')
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
                ])
                ->setHeight(250)
                ->setGrid(false);
        $this->assertEquals($chart->id(), $chart->container()['id']);
        $this->assertEquals($chart, $chart->script()['chart']);
    }

    /** @test */
    public function larapex_can_render_donut_chart()
    {
        $chart = (new LarapexChart)->setType('donut')->setTitle('Posts')->setXAxis(['Jan', 'Feb', 'Mar'])->setDataset([150, 120])->setLabels(['Published', 'No Published']);
        $this->assertEquals($chart, $chart->script()['chart']);
    }

    /** @test */
    public function larapex_can_render_pie_chart()
    {
        $chart = (new LarapexChart)->setType('pie')->setTitle('Posts')->setXAxis(['Jan', 'Feb', 'Mar'])->setDataset([150, 120])->setLabels(['Published', 'No Published']);
        $this->assertEquals($chart, $chart->script()['chart']);
    }

    /** @test */
    public function larapex_can_render_radial_bar_charts()
    {
            $chart = (new LarapexChart)->setTitle('Products with more profit')
                ->setSubtitle('From January To March')
                ->setType('radialBar')
                ->setLabels(['Product One', 'Product Two', 'Product Three'])
                ->setXAxis(['Jan', 'Feb', 'Mar'])
                ->setDataset([60, 40, 79]);
            $this->assertEquals($chart, $chart->script()['chart']);

    }

    /** @test */
    public function larapex_can_render_bar_charts()
    {
        $chart = (new LarapexChart)->setTitle('Net Profit')
            ->setSubtitle('From January To March')
            ->setType('bar')
            ->setXAxis(['Jan', 'Feb', 'Mar'])
            ->setGrid(true)
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
            ])
            ->setStroke(1);
        $this->assertEquals($chart, $chart->script()['chart']);
    }

    /** @test */
    public function larapex_can_render_line_charts()
    {
        $chart = (new LarapexChart)->setType('line')
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
                ]);
        $this->assertEquals($chart->id(), $chart->container()['id']);
        $this->assertEquals( $chart, $chart->script()['chart']  );
    }

    /** @test */
    public function larapex_can_render_horizontal_bar_chart()
    {
        $chart = (new LarapexChart)->setTitle('Net Profit')
        ->setSubtitle('From January To March')
        ->setType('bar')
        ->setHorizontal(true)
        ->setXAxis(['Jan', 'Feb', 'Mar'])
        ->setGrid(true)
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
        ])
        ->setStroke(1);
        $this->assertEquals($chart, $chart->script()['chart']);
    }

    /** @test */
    public function larapex_can_render_heatmap_chart()
    {
        $chart = (new LarapexChart)->setType('heatmap')
        ->setTitle('Total Users')
        ->setSubtitle('From January to March')
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
        ])
        ->setHeight(250)
        ->setGrid(false);
        $this->assertEquals($chart, $chart->script()['chart']);
    }

}