<?php

namespace ICA\TramiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ICA\TramiteBundle\Entity\MotivoIdentificacion;
use ICA\TramiteBundle\Form\MotivoIdentificacionType;

/**
 * MotivoIdentificacion controller.
 *
 */
class MotivoIdentificacionController extends Controller
{

    /**
     * Lists all MotivoIdentificacion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ICATramiteBundle:MotivoIdentificacion')->findAll();

        return $this->render('ICATramiteBundle:MotivoIdentificacion:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new MotivoIdentificacion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new MotivoIdentificacion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('motivoidentificacion_show', array('id' => $entity->getId())));
        }

        return $this->render('ICATramiteBundle:MotivoIdentificacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a MotivoIdentificacion entity.
     *
     * @param MotivoIdentificacion $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(MotivoIdentificacion $entity)
    {
        $form = $this->createForm(new MotivoIdentificacionType(), $entity, array(
            'action' => $this->generateUrl('motivoidentificacion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new MotivoIdentificacion entity.
     *
     */
    public function newAction()
    {
        $entity = new MotivoIdentificacion();
        $form   = $this->createCreateForm($entity);

        return $this->render('ICATramiteBundle:MotivoIdentificacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MotivoIdentificacion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ICATramiteBundle:MotivoIdentificacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MotivoIdentificacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ICATramiteBundle:MotivoIdentificacion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MotivoIdentificacion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ICATramiteBundle:MotivoIdentificacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MotivoIdentificacion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ICATramiteBundle:MotivoIdentificacion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a MotivoIdentificacion entity.
    *
    * @param MotivoIdentificacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(MotivoIdentificacion $entity)
    {
        $form = $this->createForm(new MotivoIdentificacionType(), $entity, array(
            'action' => $this->generateUrl('motivoidentificacion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing MotivoIdentificacion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ICATramiteBundle:MotivoIdentificacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MotivoIdentificacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('motivoidentificacion_edit', array('id' => $id)));
        }

        return $this->render('ICATramiteBundle:MotivoIdentificacion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a MotivoIdentificacion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ICATramiteBundle:MotivoIdentificacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MotivoIdentificacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('motivoidentificacion'));
    }

    /**
     * Creates a form to delete a MotivoIdentificacion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('motivoidentificacion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar'))
            ->getForm()
        ;
    }
}
