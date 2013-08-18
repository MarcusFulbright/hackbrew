<?php
// so cache and logs are 777
umask(0000);

use Symfony\Component\ClassLoader\DebugClassLoader;
use Symfony\Component\HttpKernel\Debug\ErrorHandler;
use Symfony\Component\HttpKernel\Debug\ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__.'/../vendor/autoload.php';

//$app = new Silex\Application();
$app = require __DIR__.'/../src/app.php';

require __DIR__.'/../src/controllers.php';

$app['debug'] = true;

$app->run();
