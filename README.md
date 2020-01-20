# Larapex Charts

A Laravel wrapper for apex charts library.

## Installation

Use composer.

```bash
composer require arielmejiadev/larapex-charts
```

## Usage

### Basic example

In your controller add:

```php
$chart = LarapexChart::setTitle('Posts')
                   ->setDataset([150, 120])
                   ->setLabels(['Published', 'No Published']);

```

Remember to import the Facade to your controller with 

```php
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart
```

Or importing the LarapexChart class:

```php
use ArielMejiaDev\LarapexCharts\LarapexChart;
```

Then in your view (Blade file) add: 

```php
 <!doctype html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport"
           content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Chart Sample</title>
 </head>
 <body>
 
     {!! $chart->container() !!}
 
     <script src="{{ $chart->cdn() }}"></script>
 
     {{ $chart->script() }}
 </body>
 </html>
```

### More complex example

```php
$chart = LarapexChart::setType('area')
        ->setTitle('Total Users Monthly')
        ->setSubtitle('From January to March')
        ->setXAxis([
            'Jan', 'Feb', 'Mar'
        ])
        ->setDataset([
            [
                'name'  =>  'Active Users',
                'data'  =>  [250, 700, 1200]
            ]
        ]);
```

You can create a variety of charts including: Line, Area, Bar, Horizantal Bar, Heatmap, pie, donut and Radialbar.

## More examples

Check the documentation on: [Larapex Chart Docs](https://arielmejiadev.github.io/LarapexCharts-Documentation/)

## Contributing

The author Ariel Mejia Dev.

## License
[MIT](./LICENSE.md)
