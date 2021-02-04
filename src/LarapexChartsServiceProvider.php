<?php

namespace ArielMejiaDev\LarapexCharts;

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

        $this->loadViewsFrom($this->packageBasePath('resources/views'), 'larapex-charts');

        $this->publishes([
            $this->packageBasePath('public/') => public_path('vendor/larapex-charts')
        ], 'larapex-charts-apexcharts-script');

        $this->publishes([
            $this->packageBasePath('resources/views') => resource_path('views/vendor/larapex-charts')
        ], 'larapex-charts-views');

        $this->publishes([
            $this->packageBasePath('config/larapex-charts.php') => base_path('config/larapex-charts.php')
        ], 'larapex-charts-config');

    }

    public function packageBasePath(string $path = '')
    {
        return __DIR__ . '/../' . $path;
    }

}