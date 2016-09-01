<?php

require_once __DIR__.'/../vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\Loader\YamlFileLoader;
use Symfony\Component\Translation\Translator;

$app = new Silex\Application();

/** Libs registration */
$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__.'/views',
]);
$app->register(new Silex\Provider\LocaleServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), [
    'locale_fallbacks' => ['en'],
]);

$app->extend('translator', function(Translator $translator, $app) {
    $translator->addLoader('yaml', new YamlFileLoader());

    $translator->addResource('yaml', __DIR__.'/locales/en.yml', 'en');
    $translator->addResource('yaml', __DIR__.'/locales/fr.yml', 'fr');

    return $translator;
});

/** Definitions */
$app['debug'] = true;
/** Routes */
$app->get('/{_locale}/', function (Request $request) use ($app) {
    $app['asset_path'] = $request->getBasePath() . '/assets/';

    return $app['twig']->render('main/index.twig', []);
});

$app->run();
