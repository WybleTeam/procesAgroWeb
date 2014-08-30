<?php

namespace ICA\TramiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ICA\TramiteBundle\Entity\EspecieAnimal;
use ICA\TramiteBundle\Form\EspecieAnimalType;

/**
 * EspecieAnimal controller.
 *
 */
class EspecieAnimalController extends Controller
{

    /**
     * Lists all EspecieAnimal entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ICATramiteBundle:EspecieAnimal')->findAll();

        return $this->render('ICATramiteBundle:EspecieAnimal:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new EspecieAnimal entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new EspecieAnimal();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Creada una especie');
            return $this->redirect($this->generateUrl('especieanimal_show', array('id' => $entity->getId())));
        }

        return $this->render('ICATramiteBundle:EspecieAnimal:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a EspecieAnimal entity.
     *
     * @param EspecieAnimal $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EspecieAnimal $entity)
    {
        $form = $this->createForm(new EspecieAnimalType(), $entity, array(
            'action' => $this->generateUrl('especieanimal_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new EspecieAnimal entity.
     *
     */
    public function newAction()
    {
        $entity = new EspecieAnimal();
        $form   = $this->createCreateForm($entity);

        return $this->render('ICATramiteBundle:EspecieAnimal:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a EspecieAnimal entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ICATramiteBundle:EspecieAnimal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EspecieAnimal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ICATramiteBundle:EspecieAnimal:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing EspecieAnimal entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ICATramiteBundle:EspecieAnimal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EspecieAnimal entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ICATramiteBundle:EspecieAnimal:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a EspecieAnimal entity.
    *
    * @param EspecieAnimal $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EspecieAnimal $entity)
    {
        $form = $this->createForm(new EspecieAnimalType(), $entity, array(
            'action' => $this->generateUrl('especieanimal_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing EspecieAnimal entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ICATramiteBundle:EspecieAnimal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EspecieAnimal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
             $this->get('session')->getFlashBag()->add(
            'notice',
            'Actualizado');
            return $this->redirect($this->generateUrl('especieanimal_edit', array('id' => $id)));
        }

        return $this->render('ICATramiteBundle:EspecieAnimal:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a EspecieAnimal entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ICATramiteBundle:EspecieAnimal')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EspecieAnimal entity.');
            }

            $em->remove($entity);
            $em->flush();
             $this->get('session')->getFlashBag()->add(
            'notice',
            'Borrada la Especie');
        }

        return $this->redirect($this->generateUrl('especieanimal'));
    }

    /**
     * Creates a form to delete a EspecieAnimal entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('especieanimal_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar', 'attr'=>array('class'=>'btn btn-warning btn-lg btn-block')))
            ->getForm()
        ;
    }
}
