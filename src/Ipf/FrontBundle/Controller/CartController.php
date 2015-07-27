<?php

namespace Ipf\FrontBundle\Controller;

use Ipf\FrontBundle\Entity\Cart;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CartController extends Controller{
    
    public function indexAction(Request $request)
    { 
        $serializer = $this->get('jms_serializer');
        $cart = new Cart($request);
        $em = $this->getDoctrine()->getManager();
        $panier = $cart->getPanier();
        
        $json = $serializer->serialize($panier, "json");

        return new \Symfony\Component\HttpFoundation\JsonResponse($json);
    }
    
    public function addAction(Request $request)
    {
        $panier = new Cart($request);
        $id = $request->get('id');

        if($id != null){
            $em = $this->getDoctrine()->getManager();
            $em->getRepository('IpfFrontBundle:Product')->findAll();
            $em->getRepository('IpfFrontBundle:picture')->findAll();
            $userProduct = $em->getRepository('IpfFrontBundle:Userproduct')->find($id);
            $panier->add($userProduct);
//            $pictures = $panier->getUserProduct(18)->getUserproductProduct()->getPictures();
//            var_dump($pictures->current());
//            die;
        }
        return $this->redirect($this->generateUrl('userproduct_show', array('id' => $userProduct->getUserproductId())));
    }
    
    public function removeAction(Request $request)
    {
        $panier = new Cart($request);
        $data = json_decode($request->getContent());
        $id = $data[0][0];
        
        if($id != null){
            $panier->remove($id);
        }
        return new \Symfony\Component\HttpFoundation\JsonResponse("ok");
    }
}