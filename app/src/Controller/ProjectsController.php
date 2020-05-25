<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectsController extends AbstractController
{
    /**
     * @Route("/{_locale}", name="homepage")
     */
    public function index(string $_locale = 'en') : Response
    {
        return $this->render('main/index.html.twig');
    }

    /**
     * @Route("/{_locale}/portfolio", name="portfolio")
     */
    public function portfolio() : Response
    {
        return $this->render('main/projects/portfolio.html.twig');
    }

    /**
     * @Route("/{_locale}/alfred", name="alfred")
     */
    public function alfred() : Response
    {
        return $this->render('main/projects/alfred.html.twig');
    }

    /**
     * @Route("/{_locale}/wildcat", name="wildcat")
     */
    public function wildcat() : Response
    {
        return $this->render('main/projects/wildcat.html.twig');
    }

    /**
     * @Route("/{_locale}/softdev-web", name="softdevWeb")
     */
    public function softdev() : Response
    {
        return $this->render('main/projects/softdev-web.html.twig');
    }

    /**
     * @Route("/{_locale}/ouimiam", name="ouimiam")
     */
    public function ouimiam() : Response
    {
        return $this->render('main/projects/ouimiam.html.twig');
    }

    /**
     * @Route("/{_locale}/bdg", name="bdg")
     */
    public function bdg() : Response
    {
        return $this->render('main/projects/bdg.html.twig');
    }
}