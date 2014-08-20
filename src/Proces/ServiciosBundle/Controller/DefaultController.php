<?php

namespace Proces\ServiciosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ServiciosBundle:Servicios')->findAll();

        return $this->render('ServiciosBundle:Default:index.html.twig', array(
            'entities' => $entities,
        ));
    }
}
