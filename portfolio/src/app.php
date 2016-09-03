<?php

require_once __DIR__.'/../vendor/autoload.php';
use Symfony\Component\Translation\Loader\YamlFileLoader;
use Symfony\Component\Translation\Translator;
use Silex\Provider\LocaleServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\TranslationServiceProvider;

const DEFAULT_LOCALE = 'en';

$app = new Silex\Application();
/** Libs registration */
$app->register(new LocaleServiceProvider());
$app->register(new TwigServiceProvider(), [
    'twig.path' => __DIR__.'/views',
]);
$app->register(new TranslationServiceProvider(), [
    'locale_fallbacks' => [DEFAULT_LOCALE],
]);

$app->extend('translator', function(Translator $translator, $app) {
    $translator->addLoader('yaml', new YamlFileLoader());

    $translator->addResource('yaml', __DIR__.'/locales/fr.yml', 'fr');
    $translator->addResource('yaml', __DIR__.'/locales/en.yml', 'en');

    return $translator;
});

/** Definitions */
$app['debug'] = true;
$app['locale'] = DEFAULT_LOCALE;

$app->mount('/', new \Portfolio\HomeControllerProvider());

/** Routes */
