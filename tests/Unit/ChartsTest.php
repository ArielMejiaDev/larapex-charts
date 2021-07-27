<?php namespace ArielMejiaDev\LarapexCharts\Tests\Unit;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use ArielMejiaDev\LarapexCharts\Tests\TestCase;

class ChartsTest extends TestCase
{
    /** @test */
    public function it_tests_larapex_charts_install_add_chart_stubs()
    {
        $chartTypes = collect([
            'PieChart',
            'DonutChart',
            'RadialBarChart',
            'PolarAreaChart',
            'LineChart',
            'AreaChart',
            'BarChart',
            'HorizontalBarChart',
            'HeatMapChart',
            'RadarChart',
        ]);

        $chartTypes->each(function ($chart) {
            $this->assertTrue(
                file_exists(base_path("stubs/charts/Default/{$chart}.stub"))
            );

            $this->assertTrue(
                file_exists(base_path("stubs/charts/Vue/{$chart}.stub"))
            );

            $this->assertTrue(
                file_exists(base_path("stubs/charts/Json/{$chart}.stub"))
            );
        });

        $this->assertTrue(
            file_exists(app_path('Console/Commands/ChartMakeCommand.php'))
        );
    }

    /** @test */
    public function it_tests_larapex_charts_can_load_script_correctly()
    {
        $chart = (new LarapexChart)
            ->setTitle('Posts')
            ->setXAxis(['Jan', 'Feb', 'Mar'])
            ->setDataset([150, 120])
            ->setLabels([__('Published'), __('No Published')]);

        $this->assertEquals($chart->dataset(), $chart->script()['chart']->dataset());
    }

    /** @test */
    public function it_tests_larapex_charts_can_change_default_config_colors()
    {
        $chart = (new LarapexChart)->setTitle('Posts')->setXAxis(['Jan', 'Feb', 'Mar'])->setDataset([150, 120]);
        $oldColors = $chart->colors();
        $chart->setColors(['#fe9700', '#607c8a']);
        $this->assertNotEquals($oldColors, $chart->colors());
    }

    /** @test */
    public function it_tests_larapex_chart_cdn_returns_a_correct_url()
    {
        $this->assertEquals('https://cdn.jsdelivr.net/npm/apexcharts' , (new LarapexChart)->cdn());
    }
}
