<?php

namespace Web\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Web\WebBundle\Entity\SolMantenimientoIdentificacion;
use Web\WebBundle\Form\SolMantenimientoIdentificacionType;
use Web\WebBundle\Entity\SolicitudCantidadMotivo;
use Web\WebBundle\Entity\EspecieRangoSolicitud;


use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WebBundle:Default:index.html.twig');
    }
 
    public function paginasAction(Request $peticion)
    {   
       $pagina = $peticion->get('pagina');
        
        return $this->render('WebBundle:Default:vista.html.twig', array(
            'pagina'=>$pagina,
        ));
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
    
    public function convocatoriastotalAction()
    {
       $em = $this->getDoctrine()->getManager();
       $entity = $em->getRepository('ConvocatoriasBundle:Convocatorias')->findConvocatoriastotal();
       
       $jsonp = new JsonResponse($entity);
       //$jsonp->setCallback('myCallback');
       return $jsonp;
    }
    
    public function cursostotalAction()
    {
       $em = $this->getDoctrine()->getManager();
       $entity = $em->getRepository('ProcesCursosBundle:CursosVirtuales')->findCursostotal();
       
       $jsonp = new JsonResponse($entity);
       //$jsonp->setCallback('myCallback');
       return $jsonp;
    }
    
    public function serviciostotalAction()
    {
       $em = $this->getDoctrine()->getManager();
       $entity = $em->getRepository('ServiciosBundle:Servicios')->findServiciostotal();
       
       $jsonp = new JsonResponse($entity);
       //$jsonp->setCallback('myCallback');
       return $jsonp;
    }
    
    public function departamentostotalAction()
    {
       $em = $this->getDoctrine()->getManager();
       $entity = $em->getRepository('OficinasBundle:Departamento')->findDepartamentostotal();
       
       $jsonp = new JsonResponse($entity);
       //$jsonp->setCallback('myCallback');
       return $jsonp;
    }
    
     public function municipiosDepartamentoAction($id)
    {
       $em = $this->getDoctrine()->getManager();
       $entity = $em->getRepository('OficinasBundle:Municipio')->findMunicipiosDepartamento($id);
       
       $jsonp = new JsonResponse($entity);
       //$jsonp->setCallback('myCallback');
       return $jsonp;
    }

    public function municipiostotalAction()
    {
       $em = $this->getDoctrine()->getManager();
       $entity = $em->getRepository('OficinasBundle:Municipio')->findMunicipiostotal();
       
       $jsonp = new JsonResponse($entity);
       //$jsonp->setCallback('myCallback');
       return $jsonp;
    }
    
     /*
     * metodo de insersion de datos desde el celular
     */
    public function crearFormularioAction($ica3101, $nombreFinca, $nombrePropietarioFinca, $cedulaPropietarioFinca, $telefonoFijoPropietario, $telefonoCelularPropietario, $municipioVereda, $departamento, $nombreSolicitante, $cedulaSolicitante, $telefonoFijoSolicitante, $telefonoCelularSolicitante, $menUnoBovino, $unoDosBovino, $dosTresBovino, $tresMayorBovino, $menUnoBufalino, $unoDosBufalino, $dosTresBufalino, $tresMayorBufalino, $jusPrimera, $jusNacimiento, $jusCompraAnimales, $jusPerdidaDin, $justificacion, $vereda)
    {     
        $ica3101 = str_replace('"', '', $ica3101);
        $nombreFinca = str_replace('"', '', $nombreFinca);
        $nombrePropietarioFinca = str_replace('"', '', $nombrePropietarioFinca);
        $nombreSolicitante = str_replace('"', '', $nombreSolicitante);
        $justificacion = str_replace('"', '', $justificacion);
        
        
        $totalBovinos   = $menUnoBovino + $unoDosBovino + $dosTresBovino + $tresMayorBovino;
        $totalBufalinos = $menUnoBufalino + $unoDosBufalino + $dosTresBufalino + $tresMayorBufalino;
        $total = $totalBovinos + $totalBufalinos;
        
        $totalJustificacion = $jusPrimera + $jusNacimiento + $jusCompraAnimales + $jusPerdidaDin;
        
        if($total<1){
            
            $respuesta = "La suma de Bovinos y bufalinos debe ser mayor o igual a 1";
            $response = new Response($respuesta);
        }elseif($total == $totalJustificacion){
        
        $em = $this->getDoctrine()->getManager();
        $hoy = new \DateTime("now");
        $entity = new SolMantenimientoIdentificacion();
        $entity->setFechaSolicitud($hoy);
        $entity->setSolicitudMantenimientoIdentificacion("...");
	$entity->setVereda($vereda);        

        $motivoUno = new SolicitudCantidadMotivo();
        $motivoDos = new SolicitudCantidadMotivo();
        $motivoTres = new SolicitudCantidadMotivo();
        $motivoCuatro = new SolicitudCantidadMotivo();
        
        
        
        /// Bovina
        $especieRangoUno = new EspecieRangoSolicitud(); 
        $especieRangoDos = new EspecieRangoSolicitud();
        $especieRangoTres = new EspecieRangoSolicitud();
        $especieRangoCuatro = new EspecieRangoSolicitud();
        /// Bufalina
        $especieRangoCinco = new EspecieRangoSolicitud();
        $especieRangoSeis = new EspecieRangoSolicitud();
        $especieRangoSiete = new EspecieRangoSolicitud();
        $especieRangoOcho = new EspecieRangoSolicitud();
        

        $entity->setJustificacionReidentificacion($justificacion);
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
        
        $orden = $em->getRepository('WebBundle:Estado')->findOneByCodigo(1); //Encontrar el primer estado, Pendiente
        
        $entity->setEstadoSolicitud($orden);
        $entity->setVereda($vereda);
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
         
         $rangoEdadesUno    = $em->getRepository('ICATramiteBundle:RangoEdades')->findOneByCodigoMotivo(1);
         $rangoEdadesDos    = $em->getRepository('ICATramiteBundle:RangoEdades')->findOneByCodigoMotivo(2);
         $rangoEdadesTres   = $em->getRepository('ICATramiteBundle:RangoEdades')->findOneByCodigoMotivo(3);
         $rangoEdadesCuatro = $em->getRepository('ICATramiteBundle:RangoEdades')->findOneByCodigoMotivo(4);
         
         $especieBovina   = $em->getRepository('ICATramiteBundle:EspecieAnimal')->findOneByCodigoMotivo(1);
         $especieBufalina = $em->getRepository('ICATramiteBundle:EspecieAnimal')->findOneByCodigoMotivo(2);
         
         /// Combinaciones con bovino
         $especieRangoUno->setCantidad($menUnoBovino);
         $especieRangoUno->setEspecieAnimal($especieBovina);
         $especieRangoUno->setRangoEdades($rangoEdadesUno);
         $especieRangoUno->setSolicitudMantenimiento($entity);
         
         $especieRangoDos->setCantidad($unoDosBovino);
         $especieRangoDos->setEspecieAnimal($especieBovina);
         $especieRangoDos->setRangoEdades($rangoEdadesDos);
         $especieRangoDos->setSolicitudMantenimiento($entity);
         
         $especieRangoTres->setCantidad($dosTresBovino);
         $especieRangoTres->setEspecieAnimal($especieBovina);
         $especieRangoTres->setRangoEdades($rangoEdadesTres);
         $especieRangoTres->setSolicitudMantenimiento($entity);
         
         $especieRangoCuatro->setCantidad($tresMayorBovino);
         $especieRangoCuatro->setEspecieAnimal($especieBovina);
         $especieRangoCuatro->setRangoEdades($rangoEdadesCuatro);
         $especieRangoCuatro->setSolicitudMantenimiento($entity);
         //////////////////////// con bufalino
         $especieRangoCinco->setCantidad($menUnoBufalino);
         $especieRangoCinco->setEspecieAnimal($especieBufalina);
         $especieRangoCinco->setRangoEdades($rangoEdadesUno);
         $especieRangoCinco->setSolicitudMantenimiento($entity);
         
         $especieRangoSeis->setCantidad($unoDosBufalino);
         $especieRangoSeis->setEspecieAnimal($especieBufalina);
         $especieRangoSeis->setRangoEdades($rangoEdadesDos);
         $especieRangoSeis->setSolicitudMantenimiento($entity);
         
         $especieRangoSiete->setCantidad($dosTresBufalino);
         $especieRangoSiete->setEspecieAnimal($especieBufalina);
         $especieRangoSiete->setRangoEdades($rangoEdadesTres);
         $especieRangoSiete->setSolicitudMantenimiento($entity);
         
         $especieRangoOcho->setCantidad($tresMayorBufalino);
         $especieRangoOcho->setEspecieAnimal($especieBufalina);
         $especieRangoOcho->setRangoEdades($rangoEdadesCuatro);
         $especieRangoOcho->setSolicitudMantenimiento($entity); 
         
       // $form = $this->createCreateForm($entity);
        //$form->handleRequest($request);
        
         
         
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            if($jusPrimera > 0){
                $em->persist($motivoUno);
            }
            if($jusNacimiento > 0){
            $em->persist($motivoDos);
            }
             if($jusCompraAnimales > 0){
            $em->persist($motivoTres);
            }
             if($jusPerdidaDin > 0){
            $em->persist($motivoCuatro);
            }
            
            if($menUnoBovino > 0){
            $em->persist($especieRangoUno);
            }
            if($unoDosBovino > 0){
            $em->persist($especieRangoDos);
            }
            if($dosTresBovino > 0){
            $em->persist($especieRangoTres);
            }
            if($tresMayorBovino > 0){
            $em->persist($especieRangoCuatro);
            }
            if($menUnoBufalino > 0){
            $em->persist($especieRangoCinco);
            }
            if($unoDosBufalino > 0){
            $em->persist($especieRangoSeis);
            }
             if($dosTresBufalino > 0){
            $em->persist($especieRangoSiete);
            }
            if($tresMayorBufalino > 0){
            $em->persist($especieRangoOcho);
            }
            
            $em->flush();
            
            $respuesta = "Insertado";
            $response = new Response($respuesta);
            
        }else{
            $respuesta = "La suma de Bovinos y bufalinos debe ser Igual a las sumas de los animales expresadas en el Motivo de la Identificacion";
            $response = new Response($respuesta);
        }
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
