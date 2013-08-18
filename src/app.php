<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\TranslationServiceProvider;

$app = new Application();
// This loads the configuration for whatever.
require __DIR__ . '/../config/config.php';
$app->register(new UrlGeneratorServiceProvider());

$app->register(new TwigServiceProvider(), array(
    'twig.path'    => array(__DIR__.'/../views'),
    'twig.options' => array('cache' => __DIR__.'/../cache'),
));

$app->register(new \Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => $app['db.options'],
));

return $app;
