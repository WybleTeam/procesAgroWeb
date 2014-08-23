<?php

namespace Proces\CursosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Proces\CursosBundle\Entity\CursosVirtuales;
use Proces\CursosBundle\Form\CursosVirtualesType;

/**
 * CursosVirtuales controller.
 *
 */
class CursosVirtualesController extends Controller
{

    /**
     * Lists all CursosVirtuales entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProcesCursosBundle:CursosVirtuales')->findAll();

        return $this->render('ProcesCursosBundle:CursosVirtuales:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new CursosVirtuales entity.
     *
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $usuarioActivo = $this->get('security.context')->getToken()->getUser();
        $entity = new CursosVirtuales();
        $entity->setUsuario($usuarioActivo);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Has creado un nuevo Curso!');
            return $this->redirect($this->generateUrl('cursosvirtuales_show', array('id' => $entity->getId())));
        }

        return $this->render('ProcesCursosBundle:CursosVirtuales:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a CursosVirtuales entity.
     *
     * @param CursosVirtuales $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(CursosVirtuales $entity)
    {
        $form = $this->createForm(new CursosVirtualesType(), $entity, array(
            'action' => $this->generateUrl('cursosvirtuales_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new CursosVirtuales entity.
     *
     */
    public function newAction()
    {
        $entity = new CursosVirtuales();
        $form   = $this->createCreateForm($entity);

        return $this->render('ProcesCursosBundle:CursosVirtuales:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CursosVirtuales entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProcesCursosBundle:CursosVirtuales')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CursosVirtuales entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProcesCursosBundle:CursosVirtuales:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CursosVirtuales entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProcesCursosBundle:CursosVirtuales')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CursosVirtuales entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProcesCursosBundle:CursosVirtuales:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a CursosVirtuales entity.
    *
    * @param CursosVirtuales $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CursosVirtuales $entity)
    {
        $form = $this->createForm(new CursosVirtualesType(), $entity, array(
            'action' => $this->generateUrl('cursosvirtuales_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing CursosVirtuales entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProcesCursosBundle:CursosVirtuales')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CursosVirtuales entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
             $this->get('session')->getFlashBag()->add(
            'notice',
            'Actualizado correctamente!');
            return $this->redirect($this->generateUrl('cursosvirtuales_edit', array('id' => $id)));
        }

        return $this->render('ProcesCursosBundle:CursosVirtuales:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a CursosVirtuales entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProcesCursosBundle:CursosVirtuales')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CursosVirtuales entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Borrado Curso!');
        }

        return $this->redirect($this->generateUrl('cursosvirtuales'));
    }

    /**
     * Creates a form to delete a CursosVirtuales entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cursosvirtuales_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar'))
            ->getForm()
        ;
    }
}
