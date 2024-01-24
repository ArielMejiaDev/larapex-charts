<?php

namespace ArielMejiaDev\LarapexCharts\Traits;

trait WithModelStub
{
    protected function resolveStubPath($stub)
    {
        $customPath = base_path("stubs/charts/{$stub}");

        $packagePath = __DIR__ . "/../stubs/charts/{$stub}";

        return file_exists($customPath) ? $customPath : $packagePath;
    }
}