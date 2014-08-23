<?php

namespace Proces\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('OfertaBundle:OfertasInstitucionales')->findPasos();
        
        return $this->render('OfertaBundle:Default:index.html.twig', array(
            'entities' => $entities,
        ));
    }
}
