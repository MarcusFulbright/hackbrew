<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig', array());
})
->bind('homepage');

$app->get(
    '/api/{endpoint}',
    function ($endpoint) use ($app) {
        $bdb = new \Pintlabs_Service_Brewerydb($app['brewerydb.api_key']);
        $bdb->setFormat('json');
        $results = $bdb->request($endpoint, array(), 'GET');

        return new JsonResponse($results);
    }
)
    ->assert('endpoint', '.+')
    ->bind('api');

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    $page = 404 == $code ? '404.html' : '500.html';

    return new Response($app['twig']->render($page, array('code' => $code)), $code);
});
