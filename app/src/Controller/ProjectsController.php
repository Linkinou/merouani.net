<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProjectsController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     * @Route("/{_locale}", name="homepage")
     */
    public function home()
    {
        return $this->render('main/index.html.twig');
    }

    /**
     * @Route("/{_locale}/portfolio", name="portfolio")
     */
    public function portfolio()
    {
        return $this->render('main/projects/portfolio.html.twig');
    }

    /**
     * @Route("/{_locale}/alfred", name="alfred")
     */
    public function alfred()
    {
        return $this->render('main/projects/alfred.html.twig');
    }

    /**
     * @Route("/{_locale}/wildcat", name="wildcat")
     */
    public function wildcat()
    {
        return $this->render('main/projects/wildcat.html.twig');
    }

    /**
     * @Route("/{_locale}/softdev-web", name="softdevWeb")
     */
    public function softdev()
    {
        return $this->render('main/projects/softdev-web.html.twig');
    }
}