<?php

namespace Web\WebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Web\WebBundle\Entity\Estado;
use Web\WebBundle\Form\EstadoType;

/**
 * Estado controller.
 *
 */
class EstadoController extends Controller
{

    /**
     * Lists all Estado entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WebBundle:Estado')->findAll();

        return $this->render('WebBundle:Estado:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Estado entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Estado();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
             $this->get('session')->getFlashBag()->add(
            'notice',
            'Creado correctamente');

            return $this->redirect($this->generateUrl('estado_show', array('id' => $entity->getId())));
        }

        return $this->render('WebBundle:Estado:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Estado entity.
     *
     * @param Estado $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Estado $entity)
    {
        $form = $this->createForm(new EstadoType(), $entity, array(
            'action' => $this->generateUrl('estado_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Estado entity.
     *
     */
    public function newAction()
    {
        $entity = new Estado();
        $form   = $this->createCreateForm($entity);

        return $this->render('WebBundle:Estado:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Estado entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebBundle:Estado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Estado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WebBundle:Estado:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Estado entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebBundle:Estado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Estado entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WebBundle:Estado:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Estado entity.
    *
    * @param Estado $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Estado $entity)
    {
        $form = $this->createForm(new EstadoType(), $entity, array(
            'action' => $this->generateUrl('estado_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Estado entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebBundle:Estado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Estado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
             $this->get('session')->getFlashBag()->add(
            'notice',
            'Actualizado correctamente');
            return $this->redirect($this->generateUrl('estado_edit', array('id' => $id)));
        }

        return $this->render('WebBundle:Estado:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Estado entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WebBundle:Estado')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Estado entity.');
            }

            $em->remove($entity);
            $em->flush();
             $this->get('session')->getFlashBag()->add(
            'notice',
            'Borrado');
        }

        return $this->redirect($this->generateUrl('estado'));
    }

    /**
     * Creates a form to delete a Estado entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estado_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar','attr'=>array('class'=>'btn btn-danger btn btn-danger btn-lg btn-block')))
            ->getForm()
        ;
    }
}
