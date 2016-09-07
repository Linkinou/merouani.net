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

        $controllers->get('/', 'Portfolio\HomeControllerProvider::home');
        $controllers->get('/{_locale}/', 'Portfolio\HomeControllerProvider::home')
                    ->bind('home');

        $controllers->get('/portfolio', 'Portfolio\HomeControllerProvider::portfolioProject');
        $controllers->get('/{_locale}/portfolio', 'Portfolio\HomeControllerProvider::portfolioProject')
                    ->bind('portfolio');

        return $controllers;
    }

    public function home(Application $app, Request $request)
    {
        $app['asset_path'] = $request->getBaseUrl() . '/';

        return $app['twig']->render('main/index.twig', []);
    }

    public function portfolioProject(Application $app, Request $request)
    {
        $app['asset_path'] = $request->getBaseUrl() . '/';

        return $app['twig']->render('main/portfolio.html.twig', []);
    }
}
