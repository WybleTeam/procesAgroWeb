<?php

namespace Web\WebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Web\WebBundle\Entity\SolicitudCantidadMotivo;
use Web\WebBundle\Form\SolicitudCantidadMotivoType;

/**
 * SolicitudCantidadMotivo controller.
 *
 */
class SolicitudCantidadMotivoController extends Controller
{

    /**
     * Lists all SolicitudCantidadMotivo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WebBundle:SolicitudCantidadMotivo')->findAll();

        return $this->render('WebBundle:SolicitudCantidadMotivo:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new SolicitudCantidadMotivo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new SolicitudCantidadMotivo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('solicitudcantidadmotivo_show', array('id' => $entity->getId())));
        }

        return $this->render('WebBundle:SolicitudCantidadMotivo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a SolicitudCantidadMotivo entity.
     *
     * @param SolicitudCantidadMotivo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SolicitudCantidadMotivo $entity)
    {
        $form = $this->createForm(new SolicitudCantidadMotivoType(), $entity, array(
            'action' => $this->generateUrl('solicitudcantidadmotivo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new SolicitudCantidadMotivo entity.
     *
     */
    public function newAction()
    {
        $entity = new SolicitudCantidadMotivo();
        $form   = $this->createCreateForm($entity);

        return $this->render('WebBundle:SolicitudCantidadMotivo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SolicitudCantidadMotivo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebBundle:SolicitudCantidadMotivo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SolicitudCantidadMotivo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WebBundle:SolicitudCantidadMotivo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SolicitudCantidadMotivo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebBundle:SolicitudCantidadMotivo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SolicitudCantidadMotivo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WebBundle:SolicitudCantidadMotivo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a SolicitudCantidadMotivo entity.
    *
    * @param SolicitudCantidadMotivo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SolicitudCantidadMotivo $entity)
    {
        $form = $this->createForm(new SolicitudCantidadMotivoType(), $entity, array(
            'action' => $this->generateUrl('solicitudcantidadmotivo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar', 'attr'=>array('class'=>'btn btn-primary btn-lg btn-block')));

        return $form;
    }
    /**
     * Edits an existing SolicitudCantidadMotivo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebBundle:SolicitudCantidadMotivo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SolicitudCantidadMotivo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('solicitudcantidadmotivo_edit', array('id' => $id)));
        }

        return $this->render('WebBundle:SolicitudCantidadMotivo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a SolicitudCantidadMotivo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WebBundle:SolicitudCantidadMotivo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SolicitudCantidadMotivo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('solicitudcantidadmotivo'));
    }

    /**
     * Creates a form to delete a SolicitudCantidadMotivo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('solicitudcantidadmotivo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar'))
            ->getForm()
        ;
    }
}
