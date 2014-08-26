<?php

namespace Web\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WebBundle:Default:index.html.twig');
    }
 
    /**
    * Fetch something as JSON
    * @return JsonResponse
    */
    public function OfertasAction()
    {
       $em = $this->getDoctrine()->getManager();
       $entity = $em->getRepository('OfertaBundle:OfertasInstitucionales')->findPasos();
       
       $jsonp = new JsonResponse($entity);
       //$jsonp->setCallback('myCallback');
       return $jsonp;
    }
}
