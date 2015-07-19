<?php

namespace Ipf\FrontBundle\Controller;

use DateTime;
use Ipf\FrontBundle\Entity\Product;
use Ipf\FrontBundle\Entity\Userproduct;
use Ipf\FrontBundle\Form\UserproductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Ipf\FrontBundle\Entity\Producttag;
use Ipf\FrontBundle\Entity\Tag;
use Ipf\FrontBundle\Entity\Cart;

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
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        var_dump($request->get('id'));
        if($request->get('id')){
            $category = $em->getRepository('IpfFrontBundle:Category')->find($request->get('id'));
            $entities = $em->getRepository('IpfFrontBundle:Userproduct')->findByCategory($category);
        }
        else{
            $entities = $em->getRepository('IpfFrontBundle:Userproduct')->findAll();
        }
        
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
            
            foreach($entity->getUserproductProduct()->getPictures() as $picture){
                $picture->setPictureProductid($entity->getUserproductProduct());
                $em->persist($picture);
                $em->flush();                
            }
            
            foreach($entity->getUserproductProduct()->getTags() as $tag){
                $tag->setTagName($tag->getTagName());
                
                $tagExist = $em->getRepository('IpfFrontBundle:Tag')->findOneBy(array('tagName'=> $tag->getTagName()));
                $productTag = new Producttag();

                if(!$tagExist){
                    $em->persist($tag);
                    $em->flush();
                    $productTag->setProducttagTag($tag);
                    $productTag->setProducttagProduct($entity->getUserproductProduct());

                }else{
                    $productTag->setProducttagTag($tagExist);
                    $productTag->setProducttagProduct($entity->getUserproductProduct());
                }
                $em->persist($productTag);
                $em->flush();
            }

            return $this->redirect($this->generateUrl('userproduct_show', array('id' => $entity->getUserproductId())));
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
     * @return Form The form
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
    public function newAction(Request $request)
    {
        $entity = new Userproduct();


        $product = new Product();
        
        $em = $this->getDoctrine()->getManager();
        if($request->get('id')){
            var_dump($request->get('id'));
            $product = $em->getRepository('IpfFrontBundle:Product')->find($request->get('id'));
            $product->setPictures(array());
        }
        $entity->setUserproductProduct($product);
        $entity->setUserproductSold(false);
        $entity->setUserproductValidated(false);
        $entity->setUserproductSaledate(new DateTime('now'));
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
        $em->getRepository('IpfFrontBundle:Product')->findAll();
        $em->getRepository('IpfFrontBundle:User')->findAll();
        $em->getRepository('IpfFrontBundle:Category')->findAll();

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
    * @return Form The form
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
     * @return Form The form
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
