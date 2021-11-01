<?php declare(strict_types=1);

namespace App;

use Nette\Configurator;
use PavolEichler\Environments\Environments;


// DEFAULT SETTINGS
$environments = new Environments(array(
    'tempDir' => __DIR__ . '/../temp',
    'logDir' => __DIR__ . '/../log',
    'appDir' => __DIR__,
    'configDir' => __DIR__ . '/config',
    'debugMode' => false,
    'forbidden' => false
));


// lurity.com home
$environments->setEnvironment(array(
    Environments::HOSTNAME => 'DESKTOP-UHM57UB'
), array(
  'config' => array('/local/@vlado.neon'),
  'debugMode' => false
));


if (gethostname() == 'DESKTOP-UHM57UB') {
	define('SERVER', 'devel');
	define('AUTH_HEADER', 'Authorization');
} else {
  define('SERVER', 'devel');
  define('AUTH_HEADER', 'Authorization');
}

\Tracy\Debugger::$showBar = FALSE;


// identify the current environment
$environment = $environments->getCurrentEnvironment();

$configurator = new Configurator;

$configurator->setTimeZone('Europe/Prague');
$configurator->setTempDirectory($environment->tempDir);

$configurator->createRobotLoader()
    ->addDirectory(__DIR__)
    ->register();

// Enable Nette Debugger for error visualisation & logging
$configurator->setDebugMode($environment->debugMode);
$configurator->enableTracy($environment->logDir);

//error_reporting(~E_USER_DEPRECATED);
//error_reporting(~E_ALL);

//$configurator->setDebugMode(FALSE);
//$configurator->enableDebugger(__DIR__ . '/../log');


// Specify folder for cache
//    $configurator->setTempDirectory(__DIR__ . '/../temp');

// Enable RobotLoader - this will load all classes automatically
$configurator->createRobotLoader()
    ->addDirectory($environment->appDir)
    ->register();


// Create Dependency Injection container from config.neon file
$configurator->addConfig($environment->appDir . '/config/config.neon');

// Add the local environment configuration file
foreach (is_array($environment->config) ? $environment->config : array($environment->config) as $config) {
  $configurator->addConfig($environment->configDir . $config);
}

$container = $configurator->createContainer();

return $container;

