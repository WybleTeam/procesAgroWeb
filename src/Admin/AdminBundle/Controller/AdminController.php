<?php

namespace Admin\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
 * Description of AdminController
 *
 * @author flia
 */
class AdminController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $solicitudes = $em->getRepository('WebBundle:SolMantenimientoIdentificacion')->findPendientes();
        $cursosActivos = $em->getRepository('ProcesCursosBundle:CursosVirtuales')->findCursosActivos();
        $convocatorias = $em->getRepository('ConvocatoriasBundle:Convocatorias')->findConvocatorias();
        $ofertas = $em->getRepository('OfertaBundle:OfertasInstitucionales')->findConvocatoriasConteo();
        return $this->render('AdminBundle:Default:index.html.twig', array(
            'pendientes'    => $solicitudes,
            'cursosActivos' => $cursosActivos,
            'convocatorias' => $convocatorias,
            'ofertas'       => $ofertas,
        ));
    }
}

