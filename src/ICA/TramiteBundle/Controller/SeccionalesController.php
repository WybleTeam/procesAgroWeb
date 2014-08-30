<?php

namespace ICA\TramiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ICA\TramiteBundle\Entity\Seccionales;
use ICA\TramiteBundle\Form\SeccionalesType;

/**
 * Seccionales controller.
 *
 */
class SeccionalesController extends Controller
{

    /**
     * Lists all Seccionales entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ICATramiteBundle:Seccionales')->findAll();

        return $this->render('ICATramiteBundle:Seccionales:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Seccionales entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Seccionales();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
             $this->get('session')->getFlashBag()->add(
            'notice',
            'OK');

            return $this->redirect($this->generateUrl('seccionales_show', array('id' => $entity->getId())));
        }

        return $this->render('ICATramiteBundle:Seccionales:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Seccionales entity.
     *
     * @param Seccionales $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Seccionales $entity)
    {
        $form = $this->createForm(new SeccionalesType(), $entity, array(
            'action' => $this->generateUrl('seccionales_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Seccionales entity.
     *
     */
    public function newAction()
    {
        $entity = new Seccionales();
        $form   = $this->createCreateForm($entity);

        return $this->render('ICATramiteBundle:Seccionales:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Seccionales entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ICATramiteBundle:Seccionales')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Seccionales entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ICATramiteBundle:Seccionales:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Seccionales entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ICATramiteBundle:Seccionales')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Seccionales entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ICATramiteBundle:Seccionales:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Seccionales entity.
    *
    * @param Seccionales $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Seccionales $entity)
    {
        $form = $this->createForm(new SeccionalesType(), $entity, array(
            'action' => $this->generateUrl('seccionales_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Seccionales entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ICATramiteBundle:Seccionales')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Seccionales entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
             $this->get('session')->getFlashBag()->add(
            'notice',
            'OK');

            return $this->redirect($this->generateUrl('seccionales_edit', array('id' => $id)));
        }

        return $this->render('ICATramiteBundle:Seccionales:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Seccionales entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ICATramiteBundle:Seccionales')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Seccionales entity.');
            }

            $em->remove($entity);
            $em->flush();
             $this->get('session')->getFlashBag()->add(
            'notice',
            'OK');
        }

        return $this->redirect($this->generateUrl('seccionales'));
    }

    /**
     * Creates a form to delete a Seccionales entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('seccionales_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar', 'attr'=>array('class' => 'btn btn-warning btn-lg btn-block')))
            ->getForm()
        ;
    }
}
