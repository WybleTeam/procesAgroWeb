<?php

namespace Proces\ConvocatoriasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ConvocatoriasBundle:Default:index.html.twig');
    }
}
