<?php

namespace Web\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Web\WebBundle\Entity\SolMantenimientoIdentificacion;
use Web\WebBundle\Form\SolMantenimientoIdentificacionType;
use Web\WebBundle\Entity\SolicitudCantidadMotivo;

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
    public function crearFormularioAction($ica3101, $nombreFinca, $nombrePropietarioFinca, $cedulaPropietarioFinca, $telefonoFijoPropietario, $telefonoCelularPropietario, $municipioVereda, $departamento, $nombreSolicitante, $cedulaSolicitante, $telefonoFijoSolicitante, $telefonoCelularSolicitante, $menUnoBovino, $unoDosBovino, $dosTresBovino, $tresMayorBovino, $menUnoBufalino, $unoDosBufalino, $dosTresBufalino, $tresMayorBufalino, $jusPrimera, $jusNacimiento, $jusCompraAnimales, $jusPerdidaDin, $justificacion)
    {                                   
        $em = $this->getDoctrine()->getManager();
        $hoy = new \DateTime("now");
        $entity = new SolMantenimientoIdentificacion();
        $entity->setFechaSolicitud($hoy);
        $entity->setSolicitudMantenimientoIdentificacion("...");
        
        $motivoUno = new SolicitudCantidadMotivo();
        $motivoDos = new SolicitudCantidadMotivo();
        $motivoTres = new SolicitudCantidadMotivo();
        $motivoCuatro = new SolicitudCantidadMotivo();
        // convertir los id a objetos
        
        //  $municipioF = $em->getRepository('OficinasBundle:Municipio')->find($municipio);
        //  $seccionalF = $em->getRepository('ICATramiteBundle:Seccionales')->find($seccional);
        /////////////////////////////
        //$entity->setMunicipio($municipioF);
        $entity->setJustificacionReidentificacion($justificacion);
        //$entity->setSeccional($seccionalF);
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
        $entity->setMunicipioVereda($municipioVereda);
        $entity->setDepartamento($departamento);
        $entity->setEstadoSolicitud("Pendiente");
        $entity->setJustificacionReidentificacion($justificacion);
        //$entity->setCantidadMotivo($motivoUno);
        
         
         $tipoMotivoUno = $em->getRepository('ICATramiteBundle:MotivoIdentificacion')->findOneByCodigoMotivo(1);
         $motivoUno->setCantidad($jusPrimera);  
         $motivoUno->setMotivoIdentificacion($tipoMotivoUno);
         $motivoUno->setSolicitudMantenimiento($entity);
         
         $tipoMotivoDos = $em->getRepository('ICATramiteBundle:MotivoIdentificacion')->findOneByCodigoMotivo(2);
         $motivoDos->setCantidad($jusNacimiento);  
         $motivoDos->setMotivoIdentificacion($tipoMotivoDos);
         $motivoDos->setSolicitudMantenimiento($entity);
         
         $tipoMotivoTres = $em->getRepository('ICATramiteBundle:MotivoIdentificacion')->findOneByCodigoMotivo(3);
         $motivoTres->setCantidad($jusCompraAnimales);  
         $motivoTres->setMotivoIdentificacion($tipoMotivoTres);
         $motivoTres->setSolicitudMantenimiento($entity);
         
         $tipoMotivoCuatro = $em->getRepository('ICATramiteBundle:MotivoIdentificacion')->findOneByCodigoMotivo(4);
         $motivoCuatro->setCantidad($jusPerdidaDin);  
         $motivoCuatro->setMotivoIdentificacion($tipoMotivoCuatro);
         $motivoCuatro->setSolicitudMantenimiento($entity);
         
         
       // $form = $this->createCreateForm($entity);
        //$form->handleRequest($request);
        
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->persist($motivoUno);
            $em->persist($motivoDos);
            $em->persist($motivoTres);
            $em->persist($motivoCuatro);
            
            $em->flush();
            
            
            $respuesta = "Insertado";
            $response = new Response($respuesta);
            return $response;
            //return $this->redirect($this->generateUrl('solmantenimiento_show', array('id' => $entity->getId())));
       
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
