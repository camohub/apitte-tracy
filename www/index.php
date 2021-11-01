<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$container = require __DIR__ . '/../app/bootstrap.php';
$container->getByType(Contributte\Middlewares\Application\IApplication::class)->run();