<?php

namespace ArielMejiaDev\LarapexCharts\Traits;

trait HasOptions
{
    protected array $options;

    /**
     * Get the value of options
     */
    public function getOptions(): array
    {
        return $this->options ? array_merge_recursive($this->getDefaultOption(), $this->options) : $this->getDefaultOption();
    }

    /**
     * Set the value of options
     */
    public function setOptions(array $options): self
    {
        $this->options = $options;

        return $this;
    }

    private function getDefaultOption(): array
    {
        return [
            'chart' => [
                'type' => $this->type(),
                'height' => $this->height(),
                'width' => $this->width(),
                'toolbar' => json_decode($this->toolbar()),
                'zoom' => json_decode($this->zoom()),
                'fontFamily' => json_decode($this->fontFamily()),
                'foreColor' => $this->foreColor(),
            ],
            'plotOptions' => [
                'bar' => json_decode($this->horizontal()),
            ],
            'colors' => json_decode($this->colors()),
            'series' => json_decode($this->dataset()),
            'dataLabels' => json_decode($this->dataLabels()),
            'title' => [
                'text' => $this->title()
            ],
            'subtitle' => [
                'text' => $this->subtitle() ? $this->subtitle() : '',
                'align' => $this->subtitlePosition() ? $this->subtitlePosition() : '',
            ],
            'xaxis' => [
                'categories' => json_decode($this->xAxis()),
            ],
            'grid' => json_decode($this->grid()),
            'markers' => json_decode($this->markers()),
        ];
    }
}
