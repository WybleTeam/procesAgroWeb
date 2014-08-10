<?php

namespace Proces\CursosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProcesCursosBundle:Default:index.html.twig');
    }
}
