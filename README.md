# Larapex Charts

A Laravel wrapper for apex charts library.

## Installation

Use composer.

```bash
composer require arielmejiadev/larapex-charts
```

## Usage

```php
$chart = LarapexChart::setType('pie')
                   ->setTitle('Posts')
                   ->setXAxis(['Jan', 'Feb', 'Mar'])
                   ->setDataset([150, 120])
                   ->setLabels(['Published', 'No Published']);

```

## Contributing

The author Ariel Mejia Dev.

## License
[MIT](./LICENSE.md)
