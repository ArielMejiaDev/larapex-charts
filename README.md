# Larapex Charts

<p align="center">
 
[![MadeWithLaravel.com shield](https://madewithlaravel.com/storage/repo-shields/2175-shield.svg)](https://madewithlaravel.com/p/larapex-charts/shield-link)

[![Latest Stable Version](https://poser.pugx.org/arielmejiadev/larapex-charts/v/stable)](https://packagist.org/packages/arielmejiadev/larapex-charts)

[![Total Downloads](https://poser.pugx.org/arielmejiadev/larapex-charts/downloads)](https://packagist.org/packages/arielmejiadev/larapex-charts)

![GitHub Actions](https://github.com/arielmejiadev/larapex-charts/actions/workflows/main.yml/badge.svg)

[![License](https://poser.pugx.org/arielmejiadev/larapex-charts/license)](https://packagist.org/packages/arielmejiadev/larapex-charts)
  
</p>

A Laravel wrapper for apex charts library Check the documentation on: [Larapex Chart Docs](https://larapex-charts.netlify.app/).

## Installation

Use composer.

```bash
composer require arielmejiadev/larapex-charts
```

## Usage

### Basic example

In your controller add:

```php
$chart = (new LarapexChart)->setTitle('Posts')
                   ->setDataset([150, 120])
                   ->setLabels(['Published', 'No Published']);

```

Remember to import the Facade to your controller with 

```php
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
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
$chart = (new LarapexChart)->setType('area')
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

You can create a variety of charts including: Line, Area, Bar, Horizontal Bar, Heatmap, pie, donut and Radialbar.

## More examples

Check the documentation on: [Larapex Chart Docs](https://larapex-charts.netlify.app/)

## Contributing

The author Ariel Mejia Dev.

## License
[MIT](./LICENSE.md)

## Support the project

Hey 👋 thanks for considering making a donation, with these donations I can continue working to contribute to opensource projects.

<a href="https://www.buymeacoffee.com/arielmejiadev">
    <img src="https://img.buymeacoffee.com/button-api/?text=Buy me a coffee&emoji=&slug=arielmejiadev&button_colour=FF5F5F&font_colour=ffffff&font_family=Cookie&outline_colour=000000&coffee_colour=FFDD00">
</a>

## Roadmap for future versions

- [ ] Add blade directive `@apexchartscdn`
- [ ] Add blade directive `@script($chart)`
- [ ] Add a chain options setter for charts
- [ ] Update Github Actions to run tests
- [ ] Update the package in general for more efficient & modern practices (spatie skeleton package)
- [ ] Add ReactJS + Inertia Support
- [ ] Add More complex charts
- [ ] Add More complex boilerplate code using Laravel/Prompts
- [ ] Add more complex boilerplate code examples using Laravel Trends Package
