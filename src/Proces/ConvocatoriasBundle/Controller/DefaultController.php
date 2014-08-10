<?php

namespace Proces\ConvocatoriasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
     /**
     * Lists all Convocatorias entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ConvocatoriasBundle:Convocatorias')->findAll();

        return $this->render('ConvocatoriasBundle:Default:index.html.twig', array(
            'entities' => $entities,
        ));
    }
}
