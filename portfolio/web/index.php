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
$app->get('/hello/{name}', function (Request $request, $name) use ($app) {

    $app['asset_path'] = $request->getBasePath() . '/assets/';

    return $app['twig']->render('index.twig', array(
        'name' => $name,
    ));
});

$app->run();
