<?php

namespace Proces\OfertaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Proces\OfertaBundle\Entity\OfertasInstitucionales;
use Proces\OfertaBundle\Form\OfertasInstitucionalesType;

/**
 * OfertasInstitucionales controller.
 *
 */
class OfertasInstitucionalesController extends Controller
{

    /**
     * Lists all OfertasInstitucionales entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('OfertaBundle:OfertasInstitucionales')->findAll();

        return $this->render('OfertaBundle:OfertasInstitucionales:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new OfertasInstitucionales entity.
     *
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $usuarioActivo = $this->get('security.context')->getToken()->getUser();
        $entity = new OfertasInstitucionales();
        $entity->setUsuario($usuarioActivo);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ofertasinstitucionales_show', array('id' => $entity->getId())));
        }

        return $this->render('OfertaBundle:OfertasInstitucionales:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a OfertasInstitucionales entity.
     *
     * @param OfertasInstitucionales $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(OfertasInstitucionales $entity)
    {
        $form = $this->createForm(new OfertasInstitucionalesType(), $entity, array(
            'action' => $this->generateUrl('ofertasinstitucionales_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new OfertasInstitucionales entity.
     *
     */
    public function newAction()
    {
        $entity = new OfertasInstitucionales();
        $form   = $this->createCreateForm($entity);

        return $this->render('OfertaBundle:OfertasInstitucionales:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a OfertasInstitucionales entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OfertaBundle:OfertasInstitucionales')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OfertasInstitucionales entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('OfertaBundle:OfertasInstitucionales:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing OfertasInstitucionales entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OfertaBundle:OfertasInstitucionales')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OfertasInstitucionales entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('OfertaBundle:OfertasInstitucionales:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a OfertasInstitucionales entity.
    *
    * @param OfertasInstitucionales $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(OfertasInstitucionales $entity)
    {
        $form = $this->createForm(new OfertasInstitucionalesType(), $entity, array(
            'action' => $this->generateUrl('ofertasinstitucionales_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing OfertasInstitucionales entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OfertaBundle:OfertasInstitucionales')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OfertasInstitucionales entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ofertasinstitucionales_edit', array('id' => $id)));
        }

        return $this->render('OfertaBundle:OfertasInstitucionales:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a OfertasInstitucionales entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('OfertaBundle:OfertasInstitucionales')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find OfertasInstitucionales entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ofertasinstitucionales'));
    }

    /**
     * Creates a form to delete a OfertasInstitucionales entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ofertasinstitucionales_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar'))
            ->getForm()
        ;
    }
}
