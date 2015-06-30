<?php

namespace Ipf\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ipf\FrontBundle\Entity\Producttag;
use Ipf\FrontBundle\Form\ProducttagType;

/**
 * Producttag controller.
 *
 */
class ProducttagController extends Controller
{

    /**
     * Lists all Producttag entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IpfFrontBundle:Producttag')->findAll();

        return $this->render('IpfFrontBundle:Producttag:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Producttag entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Producttag();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('producttag_show', array('id' => $entity->getId())));
        }

        return $this->render('IpfFrontBundle:Producttag:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Producttag entity.
     *
     * @param Producttag $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Producttag $entity)
    {
        $form = $this->createForm(new ProducttagType(), $entity, array(
            'action' => $this->generateUrl('producttag_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Producttag entity.
     *
     */
    public function newAction()
    {
        $entity = new Producttag();
        $form   = $this->createCreateForm($entity);

        return $this->render('IpfFrontBundle:Producttag:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Producttag entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IpfFrontBundle:Producttag')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Producttag entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IpfFrontBundle:Producttag:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Producttag entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IpfFrontBundle:Producttag')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Producttag entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IpfFrontBundle:Producttag:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Producttag entity.
    *
    * @param Producttag $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Producttag $entity)
    {
        $form = $this->createForm(new ProducttagType(), $entity, array(
            'action' => $this->generateUrl('producttag_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Producttag entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IpfFrontBundle:Producttag')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Producttag entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('producttag_edit', array('id' => $id)));
        }

        return $this->render('IpfFrontBundle:Producttag:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Producttag entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IpfFrontBundle:Producttag')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Producttag entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('producttag'));
    }

    /**
     * Creates a form to delete a Producttag entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('producttag_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
