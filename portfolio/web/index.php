<?php

require_once __DIR__.'/../vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();

/** Libs registration */
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

/** Definitions */
$app['debug'] = true;
/** Routes */
$app->get('/', function (Request $request) use ($app) {
    $app['asset_path'] = $request->getBasePath() . '/assets/';

    return $app['twig']->render('main/index.twig', []);
});

$app->run();
