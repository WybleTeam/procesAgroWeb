<?php

namespace Proces\ThemesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ThemesBundle:Default:index.html.twig');
    }
}
