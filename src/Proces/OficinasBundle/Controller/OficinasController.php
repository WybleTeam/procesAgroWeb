<?php

namespace Proces\OficinasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Proces\OficinasBundle\Entity\Oficinas;
use Proces\OficinasBundle\Form\OficinasType;

/**
 * Oficinas controller.
 *
 */
class OficinasController extends Controller
{

    /**
     * Lists all Oficinas entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('OficinasBundle:Oficinas')->findAll();

        return $this->render('OficinasBundle:Oficinas:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Oficinas entity.
     *
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $usuarioActivo = $this->get('security.context')->getToken()->getUser();
        $entity = new Oficinas();
        $entity->setUsuario($usuarioActivo);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
             $this->get('session')->getFlashBag()->add(
            'notice',
            'Oficina creada');
            return $this->redirect($this->generateUrl('oficinas_show', array('id' => $entity->getId())));
        }

        return $this->render('OficinasBundle:Oficinas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Oficinas entity.
     *
     * @param Oficinas $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Oficinas $entity)
    {
        $form = $this->createForm(new OficinasType(), $entity, array(
            'action' => $this->generateUrl('oficinas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Oficinas entity.
     *
     */
    public function newAction()
    {
        $entity = new Oficinas();
        $form   = $this->createCreateForm($entity);

        return $this->render('OficinasBundle:Oficinas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Oficinas entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OficinasBundle:Oficinas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Oficinas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('OficinasBundle:Oficinas:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Oficinas entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OficinasBundle:Oficinas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Oficinas entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('OficinasBundle:Oficinas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Oficinas entity.
    *
    * @param Oficinas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Oficinas $entity)
    {
        $form = $this->createForm(new OficinasType(), $entity, array(
            'action' => $this->generateUrl('oficinas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Oficinas entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OficinasBundle:Oficinas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Oficinas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Actualizado correctamente');
            return $this->redirect($this->generateUrl('oficinas_edit', array('id' => $id)));
        }

        return $this->render('OficinasBundle:Oficinas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Oficinas entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('OficinasBundle:Oficinas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Oficinas entity.');
            }

            $em->remove($entity);
            $em->flush();
             $this->get('session')->getFlashBag()->add(
            'notice',
            'Oficina borrada');
        }

        return $this->redirect($this->generateUrl('oficinas'));
    }

    /**
     * Creates a form to delete a Oficinas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('oficinas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar'))
            ->getForm()
        ;
    }
}
