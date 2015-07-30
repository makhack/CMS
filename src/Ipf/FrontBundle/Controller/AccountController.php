<?php


namespace Ipf\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccountController
 *
 * @author Jeremy
 */
class AccountController extends Controller {
    
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $entities = $em->getRepository('IpfFrontBundle:Userproduct')->findByAllSold($user);
//        $em->getRepository('IpfFrontBundle:User')->findAll();
//        $em->getRepository('IpfFrontBundle:Order')->findByBought($user);
//        var_dump($entities);
//        die;
        
        return $this->render('IpfFrontBundle:Account:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    
    
    public function soldAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $entities = $em->getRepository('IpfFrontBundle:Userproduct')->findBySold($user);
//        $em->getRepository('IpfFrontBundle:User')->findAll();
//        $em->getRepository('IpfFrontBundle:Order')->findByBought($user);
//        var_dump($entities);
//        var_dump($user);
//        die;
        
        return $this->render('IpfFrontBundle:Account:sold.html.twig', array(
            'entities' => $entities,
        ));
    }
    
    public function insaleAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $entities = $em->getRepository('IpfFrontBundle:Userproduct')->findByInSale($user);
//        $em->getRepository('IpfFrontBundle:User')->findAll();
//        $em->getRepository('IpfFrontBundle:Order')->findByBought($user);
//        var_dump($entities);
//        var_dump($user);
//        die;
        
        return $this->render('IpfFrontBundle:Account:insale.html.twig', array(
            'entities' => $entities,
        ));
    }
    
   
    
    public function boughtAction()
    {
        
        
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        //$entities = $em->getRepository('IpfFrontBundle:Orderuserproduct')->findByorderuserproductUserproduct($user);
//        $entities = $em->getRepository('IpfFrontBundle:Orderuserproduct')->findAll();
        $entities = $em->getRepository('IpfFrontBundle:Order')->findAll();
        var_dump($entities);
        die;
        
        return $this->render('IpfFrontBundle:Account:bought.html.twig', array(
            'entities' => $entities,
        ));
    }

    
    public function infouserAction()
    {
         $user = $this->getUser();
         //var_dump($user);
        $entities = $user;
           //var_dump($entities);    
        
        return $this->render('IpfFrontBundle:Account:infouser.html.twig', array(
            'entities' => $entities,
        ));
    }
    
//    
//    public function SellAction()
//    {
//        $em = $this->getDoctrine()->getManager();
//        $entities = $em->getRepository('IpfFrontBundle:Userproduct')->findAll();
//        
//        
//        return $this->render('IpfFrontBundle:Account:bought.html.twig', array(
//            'entities' => $entities,
//        ));
//    }
//    
//    public function InfoUserAction()
//    {
//        $em = $this->getDoctrine()->getManager();
//        $entities = $em->getRepository('IpfFrontBundle:User')->findAll();
//        
//        
//        return $this->render('IpfFrontBundle:Account:infouser.html.twig', array(
//            'entities' => $entities,
//        ));
//    }
    
    

    
    
}
