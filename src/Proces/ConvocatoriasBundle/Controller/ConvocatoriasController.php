<?php

namespace Proces\ConvocatoriasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Proces\ConvocatoriasBundle\Entity\Convocatorias;
use Proces\ConvocatoriasBundle\Form\ConvocatoriasType;

/**
 * Convocatorias controller.
 *
 */
class ConvocatoriasController extends Controller
{

    /**
     * Lists all Convocatorias entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ConvocatoriasBundle:Convocatorias')->findAll();

        return $this->render('ConvocatoriasBundle:Convocatorias:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Convocatorias entity.
     *
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $usuarioActivo = $this->get('security.context')->getToken()->getUser();
        $entity = new Convocatorias();
        $entity->setUsuario($usuarioActivo);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('convocatorias_show', array('id' => $entity->getId())));
        }

        return $this->render('ConvocatoriasBundle:Convocatorias:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Convocatorias entity.
     *
     * @param Convocatorias $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Convocatorias $entity)
    {
        $form = $this->createForm(new ConvocatoriasType(), $entity, array(
            'action' => $this->generateUrl('convocatorias_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Convocatorias entity.
     *
     */
    public function newAction()
    {
        $entity = new Convocatorias();
        $form   = $this->createCreateForm($entity);

        return $this->render('ConvocatoriasBundle:Convocatorias:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Convocatorias entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ConvocatoriasBundle:Convocatorias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Convocatorias entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ConvocatoriasBundle:Convocatorias:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Convocatorias entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ConvocatoriasBundle:Convocatorias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Convocatorias entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ConvocatoriasBundle:Convocatorias:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Convocatorias entity.
    *
    * @param Convocatorias $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Convocatorias $entity)
    {
        $form = $this->createForm(new ConvocatoriasType(), $entity, array(
            'action' => $this->generateUrl('convocatorias_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Convocatorias entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ConvocatoriasBundle:Convocatorias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Convocatorias entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('convocatorias_edit', array('id' => $id)));
        }

        return $this->render('ConvocatoriasBundle:Convocatorias:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Convocatorias entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ConvocatoriasBundle:Convocatorias')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Convocatorias entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('convocatorias'));
    }

    /**
     * Creates a form to delete a Convocatorias entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('convocatorias_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar'))
            ->getForm()
        ;
    }
}
