<?php

namespace Web\WebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Web\WebBundle\Entity\EspecieRangoSolicitud;
use Web\WebBundle\Form\EspecieRangoSolicitudType;

/**
 * EspecieRangoSolicitud controller.
 *
 */
class EspecieRangoSolicitudController extends Controller
{

    /**
     * Lists all EspecieRangoSolicitud entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WebBundle:EspecieRangoSolicitud')->findAll();

        return $this->render('WebBundle:EspecieRangoSolicitud:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new EspecieRangoSolicitud entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new EspecieRangoSolicitud();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('especierangosolicitud_show', array('id' => $entity->getId())));
        }

        return $this->render('WebBundle:EspecieRangoSolicitud:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a EspecieRangoSolicitud entity.
     *
     * @param EspecieRangoSolicitud $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EspecieRangoSolicitud $entity)
    {
        $form = $this->createForm(new EspecieRangoSolicitudType(), $entity, array(
            'action' => $this->generateUrl('especierangosolicitud_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EspecieRangoSolicitud entity.
     *
     */
    public function newAction()
    {
        $entity = new EspecieRangoSolicitud();
        $form   = $this->createCreateForm($entity);

        return $this->render('WebBundle:EspecieRangoSolicitud:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a EspecieRangoSolicitud entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebBundle:EspecieRangoSolicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EspecieRangoSolicitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WebBundle:EspecieRangoSolicitud:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing EspecieRangoSolicitud entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebBundle:EspecieRangoSolicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EspecieRangoSolicitud entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WebBundle:EspecieRangoSolicitud:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a EspecieRangoSolicitud entity.
    *
    * @param EspecieRangoSolicitud $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EspecieRangoSolicitud $entity)
    {
        $form = $this->createForm(new EspecieRangoSolicitudType(), $entity, array(
            'action' => $this->generateUrl('especierangosolicitud_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EspecieRangoSolicitud entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebBundle:EspecieRangoSolicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EspecieRangoSolicitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('especierangosolicitud_edit', array('id' => $id)));
        }

        return $this->render('WebBundle:EspecieRangoSolicitud:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a EspecieRangoSolicitud entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WebBundle:EspecieRangoSolicitud')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EspecieRangoSolicitud entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('especierangosolicitud'));
    }

    /**
     * Creates a form to delete a EspecieRangoSolicitud entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('especierangosolicitud_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
