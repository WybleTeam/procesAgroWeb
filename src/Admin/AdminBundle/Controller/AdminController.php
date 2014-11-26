<?php

namespace Admin\AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Web\WebBundle\Entity\SolMantenimientoIdentificacion;
use Ps\PdfBundle\Annotation\Pdf;

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
    
    /**
     * @Pdf()
     */
    public function impresionAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebBundle:SolMantenimientoIdentificacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SolMantenimientoIdentificacion entity.');
        }

        $format = $this->get('request')->get('_format');
        
        return $this->render(
            sprintf('AdminBundle:Default:impresion.%s.twig', $format),
            array('nombre' => null,
                  'entity' => $entity
            )
        );
    }
}

