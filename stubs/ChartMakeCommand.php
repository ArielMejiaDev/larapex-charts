<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ChartMakeCommand extends GeneratorCommand
{
    protected $chartTypes = [
        'Pie Chart' => 'PieChart',
        'Donut Chart' => 'DonutChart',
        'Radial Bar Chart' => 'RadialBarChart',
        'Polar Area Chart' => 'PolarAreaChart',
        'Line Chart' => 'LineChart',
        'Area Chart' => 'AreaChart',
        'Bar Chart' => 'BarChart',
        'Horizontal Bar Chart' => 'HorizontalBarChart',
        'Heatmap Chart' => 'HeatMapChart',
        'Radar Chart' => 'RadarChart',
    ];

    protected $selectedChart;

    protected function askChartType()
    {
        $option = $this->choice(
            'Select a chart type',
            array_keys($this->chartTypes),
        );
        $this->selectedChart = $this->chartTypes[$option];
    }

    public function handle(): ?bool
    {
        $this->askChartType();
        return parent::handle();
    }

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:chart';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a chart class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Chart class';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub(): string
    {
        $directory = 'Default';

        if ($this->option('vue')) {
            $directory = 'Vue';
        }

        if ($this->option('json')) {
            $directory = 'Json';
        }

        return base_path("stubs/charts/{$directory}/{$this->selectedChart}.stub");
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name): string
    {
        $stub = parent::replaceClass($stub, $name);

        $className = class_basename(str_replace('\\', '/', $name));

        return str_replace('{{ name }}', $className, $stub);
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Charts';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments(): array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the chart class.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            ['vue', 'vue', InputOption::VALUE_NONE, 'Creates a chart class for a vue component.'],
            ['json', 'json', InputOption::VALUE_NONE, 'Creates a chart class for a json API response.'],
        ];
    }
}
