<?php

namespace ICA\TramiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ICA\TramiteBundle\Entity\RangoEdades;
use ICA\TramiteBundle\Form\RangoEdadesType;

/**
 * RangoEdades controller.
 *
 */
class RangoEdadesController extends Controller
{

    /**
     * Lists all RangoEdades entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ICATramiteBundle:RangoEdades')->findAll();

        return $this->render('ICATramiteBundle:RangoEdades:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new RangoEdades entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new RangoEdades();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
             $this->get('session')->getFlashBag()->add(
            'notice',
            'OK');

            return $this->redirect($this->generateUrl('rangoedades_show', array('id' => $entity->getId())));
        }

        return $this->render('ICATramiteBundle:RangoEdades:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a RangoEdades entity.
     *
     * @param RangoEdades $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(RangoEdades $entity)
    {
        $form = $this->createForm(new RangoEdadesType(), $entity, array(
            'action' => $this->generateUrl('rangoedades_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new RangoEdades entity.
     *
     */
    public function newAction()
    {
        $entity = new RangoEdades();
        $form   = $this->createCreateForm($entity);

        return $this->render('ICATramiteBundle:RangoEdades:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a RangoEdades entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ICATramiteBundle:RangoEdades')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RangoEdades entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ICATramiteBundle:RangoEdades:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing RangoEdades entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ICATramiteBundle:RangoEdades')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RangoEdades entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ICATramiteBundle:RangoEdades:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a RangoEdades entity.
    *
    * @param RangoEdades $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(RangoEdades $entity)
    {
        $form = $this->createForm(new RangoEdadesType(), $entity, array(
            'action' => $this->generateUrl('rangoedades_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing RangoEdades entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ICATramiteBundle:RangoEdades')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RangoEdades entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
             $this->get('session')->getFlashBag()->add(
            'notice',
            'OK');

            return $this->redirect($this->generateUrl('rangoedades_edit', array('id' => $id)));
        }

        return $this->render('ICATramiteBundle:RangoEdades:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a RangoEdades entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ICATramiteBundle:RangoEdades')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find RangoEdades entity.');
            }

            $em->remove($entity);
            $em->flush();
             $this->get('session')->getFlashBag()->add(
            'notice',
            'OK');
        }

        return $this->redirect($this->generateUrl('rangoedades'));
    }

    /**
     * Creates a form to delete a RangoEdades entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rangoedades_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar','attr'=>array('class'=>'btn btn-danger btn btn-danger btn-lg btn-block')))
            ->getForm()
        ;
    }
}
