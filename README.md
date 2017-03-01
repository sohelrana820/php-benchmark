php-benchmark
======
php-benchmark is a micro library for PHP benchmark

Installation
------------

### Manually ###

Download this library and then require `src/Benchmark.php` in your project.

### Composer ###

`
composer require sohelrana820/php-benchmark
`

Usage
-----

```php
<?php

require 'vendor/autoload.php';

$benchmark = new \SohelRana820\Benchmark\Benchmark();
$benchmark->start();
for ($counter = 0; $counter < 100000; $counter++) {
    // Write some code to execute
}
$benchmark->end();

echo $benchmark->getTime(); // 10ms
echo $benchmark->getTime(true); // 0.010242

echo $benchmark->getMemoryUsage(); // 2.00Mb
echo $benchmark->getMemoryUsage(true); // 2097152 bit
echo $benchmark->getMemoryUsage(false, '%.3f%s'); // 2.000Mb

echo $benchmark->getPeakMemory(); // 2.00Mb
echo $benchmark->getPeakMemory(true); // 2097152 b
echo $benchmark->getPeakMemory(false, '%.3f%s'); // 2.000Mb

```

License
-------

php-benchmark is licensed under the MIT License
