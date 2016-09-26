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
    const   ROUTE_SOFTDEV_WEB = 'softdevWeb';
    const   ROUTE_WILDCAT = 'wildcat';
    const   ROUTE_CONTACT = 'contact';

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

        $controllers->get('/softdev-web', 'Portfolio\HomeControllerProvider::softdevWebProject');
        $controllers->get('/{_locale}/softdev-web', 'Portfolio\HomeControllerProvider::softdevWebProject')
                    ->bind(self::ROUTE_SOFTDEV_WEB);

        $controllers->get('/wildcat-attack', 'Portfolio\HomeControllerProvider::wildcatProject');
        $controllers->get('/{_locale}/wildcat-attack', 'Portfolio\HomeControllerProvider::wildcatProject')
            ->bind(self::ROUTE_WILDCAT);

//        $controllers->get('/contact', 'Portfolio\HomeControllerProvider::contactProject');
//        $controllers->get('/{_locale}/contact', 'Portfolio\HomeControllerProvider::contactProject')
//                    ->bind(self::ROUTE_CONTACT);

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

        return $app['twig']->render('main/projects/portfolio.html.twig', []);
    }

    public function alfredProject(Application $app, Request $request)
    {
        $app['asset_path'] = $request->getBaseUrl() . '/';
        $app['current_route'] = self::ROUTE_ALFRED;

        return $app['twig']->render('main/projects/alfred.html.twig', []);
    }

    public function softdevWebProject(Application $app, Request $request)
    {
        $app['asset_path'] = $request->getBaseUrl() . '/';
        $app['current_route'] = self::ROUTE_SOFTDEV_WEB;

        return $app['twig']->render('main/projects/softdev-web.html.twig', []);
    }

    public function wildcatProject(Application $app, Request $request)
    {
        $app['asset_path'] = $request->getBaseUrl() . '/';
        $app['current_route'] = self::ROUTE_WILDCAT;

        return $app['twig']->render('main/projects/wildcat.html.twig', []);
    }

//    public function contactProject(Application $app, Request $request)
//    {
//        $app['asset_path'] = $request->getBaseUrl() . '/';
//        $app['current_route'] = self::ROUTE_CONTACT;
//
//        return $app['twig']->render('main/contact.html.twig', []);
//    }

}
