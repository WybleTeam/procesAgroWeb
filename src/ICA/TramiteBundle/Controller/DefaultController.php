<?php

namespace ICA\TramiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ICATramiteBundle:Default:index.html.twig');
    }
}
