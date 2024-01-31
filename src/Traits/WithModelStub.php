<?php

namespace ArielMejiaDev\LarapexCharts\Traits;

trait WithModelStub
{
    protected function resolveStubPath(string $stub): string
    {
        $customPath = base_path("stubs/charts/{$stub}");

        $packagePath = __DIR__ . "/../stubs/charts/{$stub}";

        return file_exists($customPath) ? $customPath : $packagePath;
    }
}
