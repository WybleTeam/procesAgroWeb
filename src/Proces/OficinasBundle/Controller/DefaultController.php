<?php

namespace Proces\OficinasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('OficinasBundle:Default:index.html.twig');
    }
}
