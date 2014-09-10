<?php

namespace Proces\CursosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProcesCursosBundle:CursosVirtuales')->findCursos();
        
        return $this->render('ProcesCursosBundle:Default:index.html.twig', array(
            'entities' => $entities,
        ));
    }
}
