<?php

namespace Proces\ServiciosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Proces\ServiciosBundle\Entity\Servicios;
use Proces\ServiciosBundle\Form\ServiciosType;

/**
 * Servicios controller.
 *
 */
class ServiciosController extends Controller
{

    /**
     * Lists all Servicios entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ServiciosBundle:Servicios')->findAll();

        return $this->render('ServiciosBundle:Servicios:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Servicios entity.
     *
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $usuarioActivo = $this->get('security.context')->getToken()->getUser();
        $entity = new Servicios();
        $entity->setUsuario($usuarioActivo);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        $caracteres = array("'",'"');
        
        $titulo = str_replace($caracteres, '',$entity->getTituloServicio());
        $entity->setTituloServicio($titulo);    
        
        $descripcion = str_replace($caracteres, '',$entity->getDescripcionServicio());
        $entity->setDescripcionServicio($descripcion);
        
        $urlaudio = str_replace($caracteres, '',$entity->getUrlAudioServicio());
        $entity->setUrlAudioServicio($urlaudio);    
        
        $urlservicio = str_replace($caracteres, '',$entity->getUrlServicio());
        $entity->setUrlServicio($urlservicio);    
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Servicio creado');
            return $this->redirect($this->generateUrl('servicios_show', array('id' => $entity->getId())));
        }

        return $this->render('ServiciosBundle:Servicios:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Servicios entity.
     *
     * @param Servicios $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Servicios $entity)
    {
        $form = $this->createForm(new ServiciosType(), $entity, array(
            'action' => $this->generateUrl('servicios_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Servicios entity.
     *
     */
    public function newAction()
    {
        $entity = new Servicios();
        $form   = $this->createCreateForm($entity);

        return $this->render('ServiciosBundle:Servicios:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Servicios entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ServiciosBundle:Servicios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Servicios entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ServiciosBundle:Servicios:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Servicios entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ServiciosBundle:Servicios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Servicios entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ServiciosBundle:Servicios:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Servicios entity.
    *
    * @param Servicios $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Servicios $entity)
    {
        $form = $this->createForm(new ServiciosType(), $entity, array(
            'action' => $this->generateUrl('servicios_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Servicios entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ServiciosBundle:Servicios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Servicios entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            
                    $caracteres = array("'",'"');
        
        $titulo = str_replace($caracteres, '',$entity->getTituloServicio());
        $entity->setTituloServicio($titulo);    
        
        $descripcion = str_replace($caracteres, '',$entity->getDescripcionServicio());
        $entity->setDescripcionServicio($descripcion);
        
        $urlaudio = str_replace($caracteres, '',$entity->getUrlAudioServicio());
        $entity->setUrlAudioServicio($urlaudio);    
        
        $urlservicio = str_replace($caracteres, '',$entity->getUrlServicio());
        $entity->setUrlServicio($urlservicio); 
            
            
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Servicio actualizado');
            return $this->redirect($this->generateUrl('servicios_edit', array('id' => $id)));
        }

        return $this->render('ServiciosBundle:Servicios:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Servicios entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ServiciosBundle:Servicios')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Servicios entity.');
            }

            $em->remove($entity);
            $em->flush();
             $this->get('session')->getFlashBag()->add(
            'notice',
            'Borrado');
        }

        return $this->redirect($this->generateUrl('servicios'));
    }

    /**
     * Creates a form to delete a Servicios entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('servicios_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar','attr'=>array('class'=>'btn btn-danger btn btn-danger btn-lg btn-block')))
            ->getForm()
        ;
    }
}
