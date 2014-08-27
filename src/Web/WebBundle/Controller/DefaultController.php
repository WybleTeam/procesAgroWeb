<?php

namespace Web\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Web\WebBundle\Entity\SolMantenimientoIdentificacion;
use Web\WebBundle\Form\SolMantenimientoIdentificacionType;

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
    
    public function OfertastotalAction()
    {
       $em = $this->getDoctrine()->getManager();
       $entity = $em->getRepository('OfertaBundle:OfertasInstitucionales')->findOfertastotal();
       
       $jsonp = new JsonResponse($entity);
       //$jsonp->setCallback('myCallback');
       return $jsonp;
    }
    
    
     /*
     * metodo de insersion de datos desde el celular
     */
    public function crearFormularioAction($municipio,$seccional,$justificacion,$ica3101,$nombrefinca,$nombrePropietarioFinca,$cedulaPropietarioFinca,$telefonoFijoPropietario,$telefonoCelularPropietario,$nombreSolicitante,$cedulaSolicitante,$telefonoFijoSolicitante,$telefonoCelularSolicitante)
    {
        $em = $this->getDoctrine()->getManager();
        $hoy = new \DateTime("now");
        $entity = new SolMantenimientoIdentificacion();
        $entity->setFechaSolicitud($hoy);
        $entity->setSolicitudMantenimientoIdentificacion("...");
        
        // convertir los id a objetos
        
        $municipioF = $em->getRepository('OficinasBundle:Municipio')->find($municipio);
        
        $entity->setMunicipio($municipioF);
        $entity->setJustificacionReidentificacion($justificacion);
        $entity->setSeccional($seccional);
        $entity->setIca3101($ica3101);
        $entity->setNombreFinca($nombreFinca);
        $entity->setNombrePropietarioFinca($nombrePropietarioFinca);
        $entity->setCedulaPropietarioFinca($cedulaPropietarioFinca);
        $entity->setTelefonoFijoPropietario($telefonoFijoPropietario);
        $entity->setTelefonoCelularPropietario($telefonoCelularPropietario);
        $entity->setNombreSolicitante($nombreSolicitante);
        $entity->setCedulaSolicitante($cedulaSolicitante);
        $entity->setTelefonoFijoSolicitante($telefonoFijoSolicitante);
        $entity->setTelefonoCelularSolicitante($telefonoCelularSolicitante);
        
        
        $form = $this->createCreateForm($entity);
        //$form->handleRequest($request);
        
       
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            //return $this->redirect($this->generateUrl('solmantenimiento_show', array('id' => $entity->getId())));
        }
          $response = new Response('Hemos recibido tus datos');
          return $response;
        //return "hola";
        //return $this->render('WebBundle:SolMantenimiento:new.html.twig', array(
        //    'entity' => $entity,
        //    'form'   => $form->createView(),
        //));
    }
    
     /**
     * Creates a form to create a SolMantenimientoIdentificacion entity.
     *
     * @param SolMantenimientoIdentificacion $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SolMantenimientoIdentificacion $entity)
    {
        $form = $this->createForm(new SolMantenimientoIdentificacionType(), $entity, array(
            'action' => $this->generateUrl('solmantenimiento_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear', 'attr'=>array('class' => 'btn btn-primary btn-lg btn-block')));

        return $form;
    }
}
