<?php

namespace Portfolio;

use Symfony\Component\HttpFoundation\Request;
use Silex\Api\ControllerProviderInterface;
use Silex\Application;

class HomeControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/{_locale}/', 'Portfolio\HomeControllerProvider::home');

        return $controllers;
    }

    public function home(Application $app, Request $request)
    {
        $app['asset_path'] = $request->getBasePath() . '/assets/';

        return $app['twig']->render('main/index.twig', []);
    }

}