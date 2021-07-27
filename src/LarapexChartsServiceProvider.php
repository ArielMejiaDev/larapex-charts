<?php

namespace ArielMejiaDev\LarapexCharts;

use App\Console\Commands\ChartMakeCommand;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;

class LarapexChartsServiceProvider extends ServiceProvider
{

    /**
     * Before laravel app get all providers and methods of laravel running 
     * The package must register the service to access to package class service container and Facade
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('larapex-chart', function(){
            return new LarapexChart;
        });

        $this->mergeConfigFrom($this->packageBasePath('config/larapex-charts.php'), 'larapex-charts');
    }

    /**
     * When this method is apply we have all laravel providers and methods available
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom($this->packageBasePath('stubs/resources/views'), 'larapex-charts');

        $this->publishes([
            $this->packageBasePath('stubs/public') => public_path('vendor/larapex-charts')
        ], 'larapex-charts-apexcharts-script');

        $this->publishes([
            $this->packageBasePath('stubs/resources/views') => resource_path('views/vendor/larapex-charts')
        ], 'larapex-charts-views');

        $this->publishes([
            $this->packageBasePath('config/larapex-charts.php') => base_path('config/larapex-charts.php')
        ], 'larapex-charts-config');

        // Publishing commands
        (new Filesystem)->copyDirectory(__DIR__.'/../stubs/Console/Commands', app_path('Console/Commands'));

        // Publishing stubs
        (new Filesystem)->copyDirectory(__DIR__.'/../stubs/stubs', base_path('stubs'));

    }

    public function packageBasePath(string $path = ''): string
    {
        return __DIR__ . '/../' . $path;
    }

}
