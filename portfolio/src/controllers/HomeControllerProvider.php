<?php

namespace Portfolio;

use Symfony\Component\HttpFoundation\Request;
use Silex\Api\ControllerProviderInterface;
use Silex\Application;

class HomeControllerProvider implements ControllerProviderInterface
{
    const   ROUTE_HOME = 'home';
    const   ROUTE_PORTFOLIO = 'portfolio';
    const   ROUTE_ALFRED = 'alfred';

    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/', 'Portfolio\HomeControllerProvider::home');
        $controllers->get('/{_locale}/', 'Portfolio\HomeControllerProvider::home')
                    ->bind(self::ROUTE_HOME);

        $controllers->get('/portfolio', 'Portfolio\HomeControllerProvider::portfolioProject');
        $controllers->get('/{_locale}/portfolio', 'Portfolio\HomeControllerProvider::portfolioProject')
                    ->bind(self::ROUTE_PORTFOLIO);

        $controllers->get('/alfred', 'Portfolio\HomeControllerProvider::alfredProject');
        $controllers->get('/{_locale}/alfred', 'Portfolio\HomeControllerProvider::alfredProject')
            ->bind(self::ROUTE_ALFRED);

        return $controllers;
    }

    public function home(Application $app, Request $request)
    {
        $app['asset_path'] = $request->getBaseUrl() . '/';
        $app['current_route'] = self::ROUTE_HOME;

        return $app['twig']->render('main/index.html.twig', []);
    }

    public function portfolioProject(Application $app, Request $request)
    {
        $app['asset_path'] = $request->getBaseUrl() . '/';
        $app['current_route'] = self::ROUTE_PORTFOLIO;

        return $app['twig']->render('main/portfolio.html.twig', []);
    }

    public function alfredProject(Application $app, Request $request)
    {
        $app['asset_path'] = $request->getBaseUrl() . '/';
        $app['current_route'] = self::ROUTE_ALFRED;

        return $app['twig']->render('main/alfred.html.twig', []);
    }
}
