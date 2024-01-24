<?php namespace ArielMejiaDev\LarapexCharts\Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use ArielMejiaDev\LarapexCharts\Tests\TestCase;

class ChartsTest extends TestCase
{
    /** @test */
    public function it_tests_larapex_charts_install_add_chart_stubs(): void
    {
        Artisan::call('vendor:publish --all');

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
            $this->assertFileExists(
                base_path("stubs/charts/Default/{$chart}.stub")
            );

            $this->assertFileExists(
                base_path("stubs/charts/Vue/{$chart}.stub")
            );

            $this->assertFileExists(
                base_path("stubs/charts/Json/{$chart}.stub")
            );
        });
    }

    /** @test */
    public function it_tests_larapex_charts_can_load_script_correctly(): void
    {
        $chart = (new LarapexChart)
            ->setTitle('Posts')
            ->setXAxis(['Jan', 'Feb', 'Mar'])
            ->setDataset([150, 120])
            ->setLabels([__('Published'), __('No Published')]);

        $this->assertEquals($chart->dataset(), $chart->script()['chart']->dataset());
    }

    /** @test */
    public function it_tests_larapex_charts_can_change_default_config_colors(): void
    {
        $chart = (new LarapexChart)->setTitle('Posts')->setXAxis(['Jan', 'Feb', 'Mar'])->setDataset([150, 120]);
        $oldColors = $chart->colors();
        $chart->setColors(['#fe9700', '#607c8a']);
        $this->assertNotEquals($oldColors, $chart->colors());
    }

    /** @test */
    public function it_tests_larapex_chart_cdn_returns_a_correct_url(): void
    {
        $this->assertEquals('https://cdn.jsdelivr.net/npm/apexcharts' , (new LarapexChart)->cdn());
    }
}
