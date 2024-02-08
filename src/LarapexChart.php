<?php namespace ArielMejiaDev\LarapexCharts;

use ArielMejiaDev\LarapexCharts\Traits\HasOptions;
use Illuminate\Support\Facades\View;

class LarapexChart
{
    use HasOptions;
    /*
    |--------------------------------------------------------------------------
    | Chart
    |--------------------------------------------------------------------------
    |
    | This class build the chart by passing setters to the object, it will 
    | use the method container and scripts to generate a JSON  
    | in blade views, it works also with Vue JS components  
    |
    */

    public string $id;
    protected string $title = '';
    protected string $subtitle = '';
    protected string $subtitlePosition = 'left';
    protected string $type = 'donut';
    protected array $labels = [];
    protected string $fontFamily;
    protected string $foreColor;
    protected string $dataset = '';
    protected int $height = 500;
    protected int|string $width = '100%';
    protected string $colors;
    protected string $horizontal;
    protected string $xAxis;
    protected string $grid;
    protected string $markers;
    protected bool $stacked = false;
    protected bool $showLegend = true;
    protected string $stroke = '';
    protected string $toolbar;
    protected string $zoom;
    protected string $dataLabels;
    protected string $theme = 'light';
    protected string $sparkline;
    private string $chartLetters = 'abcdefghijklmnopqrstuvwxyz';

    /*
    |--------------------------------------------------------------------------
    | Constructors
    |--------------------------------------------------------------------------
    */

    public function __construct()
    {
        $this->id = substr(str_shuffle(str_repeat($x = $this->chartLetters, ceil(25 / strlen($x)))), 1, 25);
        $this->horizontal = json_encode(['horizontal' => false]);
        $this->colors = json_encode(config('larapex-charts.colors'));
        $this->setXAxis([]);
        $this->grid = json_encode(['show' => false]);
        $this->markers = json_encode(['show' => false]);
        $this->toolbar = json_encode(['show' => false]);
        $this->zoom = json_encode(['enabled' => true]);
        $this->dataLabels = json_encode(['enabled' => false]);
        $this->sparkline = json_encode(['enabled' => false]);
        $this->fontFamily = config('larapex-charts.font_family');
        $this->foreColor = config('larapex-charts.font_color');
        return $this;
    }

    public function pieChart() :PieChart
    {
        return new PieChart();
    }

    public function donutChart() :DonutChart
    {
        return new DonutChart();
    }

    public function radialChart() :RadialChart
    {
        return new RadialChart();
    }

    public function polarAreaChart() :PolarAreaChart
    {
        return new PolarAreaChart();
    }

    public function lineChart() :LineChart
    {
        return new LineChart();
    }

    public function areaChart() :AreaChart
    {
        return new AreaChart();
    }

    public function barChart() :BarChart
    {
        return new BarChart();
    }

    public function horizontalBarChart() :HorizontalBar
    {
        return new HorizontalBar();
    }

    public function heatMapChart() :HeatMapChart
    {
        return new HeatMapChart();
    }

    public function radarChart() :RadarChart
    {
        return new RadarChart();
    }

    /*
    |--------------------------------------------------------------------------
    | Setters
    |--------------------------------------------------------------------------
    */

    /**
     *
     * @deprecated deprecated since version 2.0
     * @param null $type
     * @return $this
     */
    public function setType($type = null) :LarapexChart
    {
        $this->type = $type;
        return $this;
    }

	public function setFontFamily($fontFamily) :LarapexChart
	{
		$this->fontFamily = $fontFamily;
		return $this;
	}

    public function setFontColor($fontColor) :LarapexChart
    {
        $this->foreColor = $fontColor;
        return $this;
    }

    public function setDataset(array $dataset): LarapexChart
    {
        $this->dataset = json_encode($dataset);
        return $this;
    }

    public function setHeight(int $height) :LarapexChart
    {
        $this->height = $height;
        return $this;
    }

    public function setWidth(int $width) :LarapexChart
    {
        $this->width = $width;
        return $this;
    }

    public function setColors(array $colors) :LarapexChart
    {
        $this->colors = json_encode($colors);
        return $this;
    }

    public function setHorizontal(bool $horizontal) :LarapexChart
    {
        $this->horizontal = json_encode(['horizontal' => $horizontal]);
        return $this;
    }

    public function setTitle(string $title) :LarapexChart
    {
        $this->title = $title;
        return $this;
    }

    public function setSubtitle(string $subtitle, string $position = 'left') :LarapexChart
    {
        $this->subtitle = $subtitle;
        $this->subtitlePosition = $position;
        return $this;
    }

    public function setLabels(array $labels) :LarapexChart
    {
        $this->labels = $labels;
        return $this;
    }

    public function setXAxis(array $categories) :LarapexChart
    {
        $this->xAxis = json_encode($categories);
        return $this;
    }

    public function setGrid($color = '#e5e5e5', $opacity = 0.1) :LarapexChart
    {
        $this->grid = json_encode([
            'show' => true,
            'row' => [
                'colors' => [$color, 'transparent'],
                'opacity' => $opacity,
            ],
        ]);

        return $this;
    }

    public function setMarkers($colors = [], $width = 4, $hoverSize = 7) :LarapexChart
    {
        if(empty($colors)) {
            $colors = config('larapex-charts.colors');
        }

        $this->markers = json_encode([
            'size' => $width,
            'colors' => $colors,
            'strokeColors' => "#fff",
            'strokeWidth' => $width / 2,
            'hover' => [
                'size' => $hoverSize,
            ]
        ]);

        return $this;
    }

    public function setStroke(int $width, array $colors = [], string $curve = 'straight') :LarapexChart
    {
        if(empty($colors)) {
            $colors = config('larapex-charts.colors');
        }

        $this->stroke = json_encode([
            'show'    =>  true,
            'width'   =>  $width,
            'colors'  =>  $colors,
            'curve'   =>  $curve,
        ]);
        return $this;
    }

    public function setToolbar(bool $show, bool $zoom = true) :LarapexChart
    {
        $this->toolbar = json_encode(['show' => $show]);
        $this->zoom = json_encode(['enabled' => $zoom ? $zoom : false]);
        return $this;
    }

    public function setDataLabels(bool $enabled = true) :LarapexChart
    {
        $this->dataLabels = json_encode(['enabled' => $enabled]);
        return $this;
    }

    public function setTheme(string $theme) :LarapexChart
    {
        $this->theme = $theme;
	return $this;
    }
  
    public function setSparkline(bool $enabled = true): LarapexChart
    {
        $this->sparkline = json_encode(['enabled' => $enabled]);
        return $this;
    }

    public function setStacked(bool $stacked = true): LarapexChart
    {
        $this->stacked = $stacked;
        return $this;
    }

    public function setShowLegend(bool $showLegend = true): self
    {
        $this->showLegend = $showLegend;
        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Getters
    |--------------------------------------------------------------------------
    */

    public function transformLabels(array $array): bool|string
    {
        $stringArray = array_filter($array, function($string){
            return "{$string}";
        });
        return json_encode(['"' . implode('","', $stringArray) . '"']);
    }

    public function container(): mixed
    {
        return View::make('larapex-charts::chart.container', ['id' => $this->id()]);
    }

    public function script(): mixed
    {
        return View::make('larapex-charts::chart.script', ['chart' => $this]);
    }

    public static function cdn() :string
    {
        return 'https://cdn.jsdelivr.net/npm/apexcharts';
    }

    public function id(): string
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function subtitle(): string
    {
        return $this->subtitle;
    }

    public function subtitlePosition(): string
    {
        return $this->subtitlePosition;
    }

    public function type(): string
    {
        return $this->type;
    }

	public function fontFamily(): string
    {
		return $this->fontFamily;
	}

    public function foreColor(): string
    {
        return $this->foreColor;
    }

    public function labels(): array
    {
        return $this->labels;
    }

    public function dataset(): string
    {
        return $this->dataset;
    }

    public function height() :int
    {
        return $this->height;
    }

    public function width() :string
    {
        return $this->width;
    }

    public function colors(): bool|string
    {
        return $this->colors;
    }

    public function horizontal(): bool|string
    {
        return $this->horizontal;
    }

    public function xAxis(): string
    {
        return $this->xAxis;
    }

    public function grid(): bool|string
    {
        return $this->grid;
    }

    public function markers(): bool|string
    {
        return $this->markers;
    }

    public function stroke(): string
    {
        return $this->stroke;
    }

    public function toolbar(): bool|string
    {
        return $this->toolbar;
    }

    public function zoom(): bool|string
    {
        return $this->zoom;
    }

    public function dataLabels(): bool|string
    {
        return $this->dataLabels;
    }

    public function sparkline(): bool|string
    {
        return $this->sparkline;
    }

    public function stacked(): bool
    {
        return $this->stacked;
    }

    public function showLegend(): string
    {
        return $this->showLegend ? 'true' : 'false';
    }

    /*
    |--------------------------------------------------------------------------
    | JSON Options Builder
    |--------------------------------------------------------------------------
    */

    public function toJson(): \Illuminate\Http\JsonResponse
    {
        $options = [
            'chart' => [
                'type' => $this->type(),
                'height' => $this->height(),
                'width' => $this->width(),
                'toolbar' => json_decode($this->toolbar()),
                'zoom' => json_decode($this->zoom()),
                'fontFamily' => json_decode($this->fontFamily()),
                'foreColor' => $this->foreColor(),
                'sparkline' => $this->sparkline(),
                'stacked' => $this->stacked(),
            ],
            'plotOptions' => [
                'bar' => json_decode($this->horizontal()),
            ],
            'colors' => json_decode($this->colors()),
            'series' => json_decode($this->dataset()),
            'dataLabels' => json_decode($this->dataLabels()),
            'theme' => [
                'mode' => $this->theme
            ],
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
            'legend' => [
                'show' => $this->showLegend()
            ],
        ];

        if($this->labels()) {
            $options['labels'] = $this->labels();
        }

        if($this->stroke()) {
            $options['stroke'] = json_decode($this->stroke());
        }

        return response()->json([
            'id' => $this->id(),
            'options' => $options,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Vue Options Builder
    |--------------------------------------------------------------------------
    */

    public function toVue() :array
    {
        $options = [
            'chart' => [
                'height' => $this->height(),
                'toolbar' => json_decode($this->toolbar()),
                'zoom' => json_decode($this->zoom()),
                'fontFamily' => json_decode($this->fontFamily()),
                'foreColor' => $this->foreColor(),
                'sparkline' => json_decode($this->sparkline()),
                'stacked' => $this->stacked(),
            ],
            'plotOptions' => [
                'bar' => json_decode($this->horizontal()),
            ],
            'colors' => json_decode($this->colors()),
            'dataLabels' => json_decode($this->dataLabels()),
            'theme' => [
                'mode' => $this->theme
            ],
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
            'legend' => [
                'show' => $this->showLegend()
            ]
        ];

        if($this->labels()) {
            $options['labels'] = $this->labels();
        }

        if($this->stroke()) {
            $options['stroke'] = json_decode($this->stroke());
        }

        return [
            'height' => $this->height(),
            'width' => $this->width(),
            'type' => $this->type(),
            'options' => $options,
            'series' => json_decode($this->dataset()),
        ];
    }
}
