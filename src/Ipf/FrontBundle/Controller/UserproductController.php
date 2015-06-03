<?php

namespace Ipf\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ipf\FrontBundle\Entity\Userproduct;
use Ipf\FrontBundle\Form\UserproductType;

/**
 * Userproduct controller.
 *
 */
class UserproductController extends Controller
{

    /**
     * Lists all Userproduct entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IpfFrontBundle:Userproduct')->findAll();
        $em->getRepository('IpfFrontBundle:product')->findAll();
        $em->getRepository('IpfFrontBundle:user')->findAll();
        return $this->render('IpfFrontBundle:Userproduct:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Userproduct entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Userproduct();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('userproduct_show', array('id' => $entity->getId())));
        }

        return $this->render('IpfFrontBundle:Userproduct:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Userproduct entity.
     *
     * @param Userproduct $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Userproduct $entity)
    {
        $form = $this->createForm(new UserproductType(), $entity, array(
            'action' => $this->generateUrl('userproduct_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Userproduct entity.
     *
     */
    public function newAction()
    {
        $entity = new Userproduct();
        $form   = $this->createCreateForm($entity);

        return $this->render('IpfFrontBundle:Userproduct:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Userproduct entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IpfFrontBundle:Userproduct')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Userproduct entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IpfFrontBundle:Userproduct:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Userproduct entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IpfFrontBundle:Userproduct')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Userproduct entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IpfFrontBundle:Userproduct:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Userproduct entity.
    *
    * @param Userproduct $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Userproduct $entity)
    {
        $form = $this->createForm(new UserproductType(), $entity, array(
            'action' => $this->generateUrl('userproduct_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Userproduct entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IpfFrontBundle:Userproduct')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Userproduct entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('userproduct_edit', array('id' => $id)));
        }

        return $this->render('IpfFrontBundle:Userproduct:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Userproduct entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IpfFrontBundle:Userproduct')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Userproduct entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('userproduct'));
    }

    /**
     * Creates a form to delete a Userproduct entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('userproduct_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
