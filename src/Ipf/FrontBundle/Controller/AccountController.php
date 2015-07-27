<?php


namespace Ipf\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ipf\FrontBundle\Entity\Userproduct;
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
        $entities = $em->getRepository('IpfFrontBundle:Userproduct')->findAll();
                $em->getRepository('IpfFrontBundle:product')->findAll();
        $em->getRepository('IpfFrontBundle:user')->findAll();
        
        return $this->render('IpfFrontBundle:Account:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    
    
    public function SoldAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $entities = $em->getRepository('IpfFrontBundle:Userproduct')->findBySold($user);
//        var_dump($entities);
//        die;
        
        return $this->render('IpfFrontBundle:Account:sold.html.twig', array(
            'entities' => $entities,
        ));
    }
//    
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
