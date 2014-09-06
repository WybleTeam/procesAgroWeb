<?php

namespace Web\WebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Web\WebBundle\Entity\SolMantenimientoIdentificacion;
use Web\WebBundle\Form\SolMantenimientoIdentificacionType;
use Web\WebBundle\Entity\SolicitudCantidadMotivo;

/**
 * SolMantenimiento controller.
 *
 */
class SolMantenimientoController extends Controller
{

    /**
     * Lists all SolMantenimiento entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WebBundle:SolMantenimientoIdentificacion')->findAll();

        return $this->render('WebBundle:SolMantenimiento:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new SolMantenimientoIdentificacion entity.
     *
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $hoy = new \DateTime("now");
        $entity = new SolMantenimientoIdentificacion();
        $entity->setFechaSolicitud($hoy);
        $entity->setSolicitudMantenimientoIdentificacion("...");
        $orden = $em->getRepository('WebBundle:Estado')->findOneByCodigo(1); //Encontrar el primer estado, Pendiente
        
        $entity->setEstadoSolicitud($orden);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        
       
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'OK');
            return $this->redirect($this->generateUrl('solmantenimiento_show', array('id' => $entity->getId())));
        }

        return $this->render('WebBundle:SolMantenimiento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
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

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new SolMantenimientoIdentificacion entity.
     *
     */
    public function newAction()
    {
        $entity = new SolMantenimientoIdentificacion();
        $form   = $this->createCreateForm($entity);

        return $this->render('WebBundle:SolMantenimiento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SolMantenimientoIdentificacion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebBundle:SolMantenimientoIdentificacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SolMantenimientoIdentificacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WebBundle:SolMantenimiento:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SolMantenimientoIdentificacion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebBundle:SolMantenimientoIdentificacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SolMantenimientoIdentificacion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WebBundle:SolMantenimiento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a SolMantenimientoIdentificacion entity.
    *
    * @param SolMantenimientoIdentificacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SolMantenimientoIdentificacion $entity)
    {
        $form = $this->createForm(new SolMantenimientoIdentificacionType(), $entity, array(
            'action' => $this->generateUrl('solmantenimiento_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing SolMantenimientoIdentificacion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebBundle:SolMantenimientoIdentificacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SolMantenimientoIdentificacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
             $this->get('session')->getFlashBag()->add(
            'notice',
            'OK');

            return $this->redirect($this->generateUrl('solmantenimiento_edit', array('id' => $id)));
        }

        return $this->render('WebBundle:SolMantenimiento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a SolMantenimientoIdentificacion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WebBundle:SolMantenimientoIdentificacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SolMantenimientoIdentificacion entity.');
            }

            $em->remove($entity);
            $em->flush();
             $this->get('session')->getFlashBag()->add(
            'notice',
            'OK');
        }

        return $this->redirect($this->generateUrl('solmantenimiento'));
    }

    /**
     * Creates a form to delete a SolMantenimientoIdentificacion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('solmantenimiento_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar','attr'=>array('class'=>'btn btn-danger btn btn-danger btn-lg btn-block')))
            ->getForm()
        ;
    }
}
