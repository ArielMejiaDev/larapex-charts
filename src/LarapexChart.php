<?php namespace ArielMejiaDev\LarapexCharts;

use Illuminate\Support\Facades\View;

class LarapexChart
{
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

    public $id;
    protected $title;
    protected $subtitle;
    protected $subtitlePosition;
    protected $type = 'donut';
    protected $labels;
    protected $fontFamily;
    protected $foreColor;
    protected $dataset;
    protected $height = 500;
    protected $width;
    protected $background = false;
    protected $theme;
    protected $colors;
    protected $horizontal;
    protected $barOptions;
    protected $legend;
    protected $xAxis;
    protected $xAxisType = false;
    protected $xAxisBorder = false;
    protected $xAxisTicks = false;
    protected $xAxisLabels = false;
    protected $tooltip = false;
    protected $grid;
    protected $markers;
    protected $stroke;
    protected $toolbar;
    protected $zoom;
    protected $dataLabels;
    protected $sparkline;
    private $chartLetters = 'abcdefghijklmnopqrstuvwxyz';

    /*
    |--------------------------------------------------------------------------
    | Constructors
    |--------------------------------------------------------------------------
    */

    public function __construct()
    {
        $this->id = substr(str_shuffle(str_repeat($x = $this->chartLetters, ceil(25 / strlen($x)))), 1, 25);
        $this->horizontal = ['horizontal' => false];
        $this->barOptions = [];
        $this->legend = json_encode(['show' => true]);
        $this->colors = json_encode(config('larapex-charts.colors'));
        $this->theme = 'light';
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

    public function setDataset($dataset): LarapexChart
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

    public function setBackground(string $background) :LarapexChart
    {
        $this->background = $background;
        return $this;
    }

    public function setColors(array $colors) :LarapexChart
    {
        $this->colors = json_encode($colors);
        return $this;
    }

    public function setTooltip(array $tooltip) :LarapexChart
    {
        $this->tooltip = json_encode($tooltip, JSON_FORCE_OBJECT);
        return $this;
    }

    public function setTheme(string $theme) :LarapexChart
    {
        $this->theme = $theme;
        return $this;
    }

    public function setHorizontal(bool $horizontal) :LarapexChart
    {
        $this->horizontal = ['horizontal' => $horizontal];
        return $this;
    }

    public function setBarOptions(array $barOptions) :LarapexChart
    {
        $this->barOptions = $barOptions;
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

    public function setLegend(array $legend) :LarapexChart
    {
        $this->legend = json_encode($legend);
        return $this;
    }

    public function setXAxis(array $categories) :LarapexChart
    {
        $this->xAxis = json_encode($categories);
        return $this;
    }

    public function setXAxisBorder(array $xAxisBorder) :LarapexChart
    {
        $this->xAxisBorder = json_encode($xAxisBorder);
        return $this;
    }

    public function setXAxisTicks(array $xAxisTicks) :LarapexChart
    {
        $this->xAxisTicks = json_encode($xAxisTicks);
        return $this;
    }

    public function setXAxisType(string $xAxisType) :LarapexChart
    {
        $this->xAxisType = $xAxisType;
        return $this;
    }

    public function setXAxisLabels(array $xAxisLabels) :LarapexChart
    {
        $this->xAxisLabels = json_encode($xAxisLabels);
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

    public function setStroke(int $width, array $colors = []) :LarapexChart
    {
        if(empty($colors)) {
            $colors = config('larapex-charts.colors');
        }

        $this->stroke = json_encode([
            'show'    =>  true,
            'width'   =>  $width,
            'colors'  =>  $colors,
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

    public function setSparkline(bool $enabled = true): LarapexChart
    {
        $this->sparkline = json_encode(['enabled' => $enabled]);
        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Getters
    |--------------------------------------------------------------------------
    */

    /**
     * @param array $array
     * @return array|false|string
     */
    public function transformLabels(array $array)
    {
        $stringArray = array_filter($array, function($string){
            return "{$string}";
        });
        return json_encode(['"' . implode('","', $stringArray) . '"']);
    }

    /**
     * @return mixed
     */
    public function container()
    {
        return View::make('larapex-charts::chart.container', ['id' => $this->id()]);
    }

    /**
     * @return mixed
     */
    public function script()
    {
        return View::make('larapex-charts::chart.script', ['chart' => $this]);
    }

    public static function cdn() :string
    {
        return 'https://cdn.jsdelivr.net/npm/apexcharts';
    }

    /**
     * @return false|string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function subtitle()
    {
        return $this->subtitle;
    }

    /**
     * @return mixed
     */
    public function subtitlePosition()
    {
        return $this->subtitlePosition;
    }

    /**
     * @return string
     */
    public function type()
    {
        return $this->type;
    }

	/**
	 * @return string
	 */
	public function fontFamily()
	{
		return $this->fontFamily;
	}

    /**
     * @return string
     */
    public function foreColor()
    {
        return $this->foreColor;
    }

    /**
     * @return mixed
     */
    public function labels()
    {
        return $this->labels;
    }

    /**
     * @return string
     */
    public function legend()
    {
        return $this->legend;
    }

    /**
     * @return mixed
     */
    public function dataset()
    {
        return $this->dataset;
    }

    /**
     * @return int
     */
    public function height() :int
    {
        return $this->height;
    }

    public function width() :string
    {
        return $this->width ? $this->width : '100%';
    }

    /**
     * @return string
     */
    public function background()
    {
        return $this->background;
    }

    /**
     * @return string
     */
    public function tooltip()
    {
        return $this->tooltip;
    }

    /**
     * @return false|string
     */
    public function colors()
    {
        return $this->colors;
    }

    /**
     * @return false|string
     */
    public function theme()
    {
        return $this->theme;
    }

    /**
     * @return string
     */
    public function barOptions()
    {
        return $this->barOptions;
    }

    /**
     * @return false|string
     */
    public function horizontal()
    {
        return $this->horizontal;
    }

    /**
     * @return string
     */
    public function plotOptionsBar()
    {
        $join_array = array_merge($this->barOptions, $this->horizontal);
        return json_encode($join_array);
    }

    /**
     * @return mixed
     */
    public function xAxis()
    {
        return $this->xAxis;
    }

    /**
     * @return string
     */
    public function xAxisType()
    {
        return $this->xAxisType;
    }

    /**
     * @return boolean
     */
    public function xAxisTicks()
    {
        return $this->xAxisTicks;
    }

    /**
     * @return array
     */
    public function xAxisBorder()
    {
        return $this->xAxisBorder;
    }

    /**
     * @return array
     */
    public function xAxisLabels()
    {
        return $this->xAxisLabels;
    }

    /**
     * @return false|string
     */
    public function grid()
    {
        return $this->grid;
    }

    /**
     * @return false|string
     */
    public function markers()
    {
        return $this->markers;
    }

    /**
     * @return mixed
     */
    public function stroke()
    {
        return $this->stroke;
    }

    /**
     * @return true|boolean
     */
    public function toolbar()
    {
        return $this->toolbar;
    }

    /**
     * @return true|boolean
     */
    public function zoom()
    {
        return $this->zoom;
    }

    /**
     * @return true|boolean
     */
    public function dataLabels()
    {
        return $this->dataLabels;
    }

    /**
     * @return true|boolean
     */
    public function sparkline()
    {
        return $this->sparkline;
    }

    /*
    |--------------------------------------------------------------------------
    | JSON Helper
    |--------------------------------------------------------------------------
    */

    public function toJson()
    {
        $options = [
            'chart' => [
                'type' => $this->type(),
                'height' => $this->height(),
                'width' => $this->width(),
                'background' => $this->background(),
                'toolbar' => json_decode($this->toolbar()),
                'zoom' => json_decode($this->zoom()),
                'fontFamily' => json_decode($this->fontFamily()),
                'foreColor' => $this->foreColor(),
                'sparkline' => $this->sparkline(),
            ],
            'plotOptions' => [
                'bar' => json_decode($this->plotOptionsBar()),
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
            'legend' => json_decode($this->legend()),
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

    public function toVue() :array
    {
        $options = [
            'chart' => [
                'height' => $this->height(),
                'toolbar' => json_decode($this->toolbar()),
                'background' => $this->background(),
                'zoom' => json_decode($this->zoom()),
                'fontFamily' => json_decode($this->fontFamily()),
                'foreColor' => $this->foreColor(),
                'sparkline' => json_decode($this->sparkline()),
            ],
            'plotOptions' => [
                'bar' => json_decode($this->plotOptionsBar()),
            ],
            'colors' => json_decode($this->colors()),
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
            'legend' => json_decode($this->legend()),
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
