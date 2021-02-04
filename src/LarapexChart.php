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
    protected $dataset;
    protected $height = 350;
    protected $colors;
    protected $horizontal;
    protected $xAxis;
    protected $grid;
    protected $markers;
    protected $stroke;
    protected $toolbar;
    protected $zoom;
    protected $dataLabels;
    private $chartLetters = 'abcdefghijklmnopqrstuvwxyz';

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
        return $this;
    }

    public function setType($type = null)
    {
        $this->type = $type;
        return $this;
    }

    public function setDataset($dataset)
    {
        $this->dataset = json_encode($dataset);
        return $this;
    }

    public function setHeight(int $height)
    {
        $this->height = $height;
        return $this;
    }

    public function setColors(array $colors)
    {
        $this->colors = json_encode($colors);
        return $this;
    }

    public function setHorizontal(bool $horizontal)
    {
        $this->horizontal = json_encode(['horizontal' => $horizontal]);
        return $this;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function setSubtitle(string $subtitle, string $position = 'left')
    {
        $this->subtitle = $subtitle;
        $this->subtitlePosition = $position;
        return $this;
    }

    public function setLabels(array $labels)
    {
        $this->labels = $this->transformLabels($labels);
        return $this;
    }

    public function setXAxis(array $categories)
    {
        $this->xAxis = json_encode($categories);
        return $this;
    }

    public function setGrid($transparent = true, $color = '#e5e5e5', $opacity = 0.1)
    {
        if($transparent) {
            $this->grid = json_encode(['show' => true]);
            return $this;
        }

        $this->grid = json_encode([
            'row' => [
                'colors' => [$color, 'transparent'],
                'opacity' => $opacity ? $opacity : 0.5
            ],
        ]);

        return $this;
    }

    public function setMarkers($colors = [], $width = 4, $hoverSize = 7)
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

    public function setStroke(int $width, array $colors = [])
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

    public function setToolbar(bool $show, $zoom = true)
    {
        $this->toolbar = json_encode(['show' => $show]);
        $this->zoom = json_encode(['enabled' => $zoom ? $zoom : false]);
        return $this;
    }

    public function setDataLabels(bool $enabled)
    {
        $this->dataLabels = json_encode(['enabled' => $enabled]);
        return $this;
    }

    public function transformLabels(array $array)
    {
        $stringArray = array_filter($array, function($string){
            return "{$string}";
        });
        return '"' . implode('","', $stringArray) . '"';
    }

    public function container()
    {
        return View::make('larapex-charts::chart.container', ['id' => $this->id()]);
    }

    public function script()
    {
        return View::make('larapex-charts::chart.script', ['chart' => $this]);
    }

    public function cdn()
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
     * @return mixed
     */
    public function labels()
    {
        return $this->labels;
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
    public function height()
    {
        return $this->height;
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
    public function horizontal()
    {
        return $this->horizontal;
    }

    /**
     * @return mixed
     */
    public function xAxis()
    {
        return $this->xAxis;
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

}
