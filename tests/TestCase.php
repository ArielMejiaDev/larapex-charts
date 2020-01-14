<?php namespace ArielMejiaDev\LarapexCharts\Tests;

use ArielMejiaDev\LarapexCharts\LarapexChartsRouteServiceProvider;
use Orchestra\Testbench\TestCase as TestbenchTestCase;
use ArielMejiaDev\LarapexCharts\LarapexChartsServiceProvider;

class TestCase extends TestbenchTestCase
{
    /**
     * Sets the env data to interact as env file values
     *
     * @param [type] $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connection.testing', [
            'driver'    => 'sqlite',
            'database'  => ':memory:'
        ]);
    }

    // set providers to test the class
    protected function getPackageProviders($app)
    {
        return [
            LarapexChartsServiceProvider::class,
        ];
    }

    // With this method I can use the facade instead of all class namespace
    protected function getPackageAliases($app)
    {
        return [
            'FirstPackage' => \ArielMejiaDev\LarapexCharts\Facades\LarapexChart::class
        ];
    }

}