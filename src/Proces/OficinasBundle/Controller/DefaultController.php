<?php

namespace Proces\OficinasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('OficinasBundle:Default:index.html.twig', array('name' => $name));
    }
}
