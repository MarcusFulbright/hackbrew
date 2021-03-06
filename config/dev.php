<?php

/**
 * Development settings
 */
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;

require __DIR__.'/prod.php';

$app['debug'] = true;

$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/../logs/silex_dev.log',
));

$app->register($p = new WebProfilerServiceProvider(), array(
    'profiler.cache_dir' => __DIR__.'/../cache/profiler',
));
$app->mount('/_profiler', $p);
