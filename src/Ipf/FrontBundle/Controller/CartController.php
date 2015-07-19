<?php

namespace Ipf\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ipf\FrontBundle\Entity\Cart;


class CartController extends Controller{
    
    public function indexAction(Request $request)
    {
        var_dump('index');
        $panier = new Cart($request);
        var_dump($panier->getPanier());
        die;
    }
    
    public function addAction(Request $request)
    {
        $panier = new Cart($request);
//        $id = $request->request->get(18);
        $id = 20;
        if($id != null){
            $em = $this->getDoctrine()->getManager();

            $product = $em->getRepository('IpfFrontBundle:Userproduct')->find($id);
            $panier->add($product);
        }
        var_dump($panier->getPanier());
        die;
    }
    
    public function removeAction(Request $request)
    {
        $panier = new Cart($request);
//        $id = $request->request->get('id');
        $id = 20;
        if($id != null){
            $panier->remove($id);
        }
        die;
    }
}