<?php

namespace Proces\OfertaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Proces\OfertaBundle\Entity\PasosOferta;
use Proces\OfertaBundle\Form\PasosOfertaType;

/**
 * PasosOferta controller.
 *
 */
class PasosOfertaController extends Controller
{

    /**
     * Lists all PasosOferta entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('OfertaBundle:PasosOferta')->findAll();

        return $this->render('OfertaBundle:PasosOferta:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new PasosOferta entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new PasosOferta();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pasosoferta_show', array('id' => $entity->getId())));
        }

        return $this->render('OfertaBundle:PasosOferta:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a PasosOferta entity.
     *
     * @param PasosOferta $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(PasosOferta $entity, $oferta)
    {
        $form = $this->createForm(new PasosOfertaType(), $entity, array(
            'action' => $this->generateUrl('pasosoferta_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new PasosOferta entity.
     *
     */
    public function newAction($oferta)
    {
        $em = $this->getDoctrine()->getManager();
        $ofertaIns = $em->getRepository('OfertaBundle:OfertasInstitucionales')->find($oferta);
        $entity = new PasosOferta();
        $entity->setOfertaInstitucional($ofertaIns);
        $form   = $this->createCreateForm($entity,$oferta);

        return $this->render('OfertaBundle:PasosOferta:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'oferta' => $oferta,
            'ofertaIns'=> $ofertaIns,
        ));
    }

    /**
     * Finds and displays a PasosOferta entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OfertaBundle:PasosOferta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PasosOferta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('OfertaBundle:PasosOferta:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PasosOferta entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OfertaBundle:PasosOferta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PasosOferta entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('OfertaBundle:PasosOferta:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a PasosOferta entity.
    *
    * @param PasosOferta $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PasosOferta $entity)
    {
        $form = $this->createForm(new PasosOfertaType(), $entity, array(
            'action' => $this->generateUrl('pasosoferta_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing PasosOferta entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OfertaBundle:PasosOferta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PasosOferta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('pasosoferta_edit', array('id' => $id)));
        }

        return $this->render('OfertaBundle:PasosOferta:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a PasosOferta entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('OfertaBundle:PasosOferta')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PasosOferta entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pasosoferta'));
    }

    /**
     * Creates a form to delete a PasosOferta entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pasosoferta_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar'))
            ->getForm()
        ;
    }
}
