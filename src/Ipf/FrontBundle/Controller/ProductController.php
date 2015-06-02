<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ipf\FrontBundle\Controller;

use Ipf\FrontBundle\Entity\Product;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
 * Description of ProductController
 *
 * @author MakHack
 */
class ProductController extends Controller {
    
    public function indexAction()
    {
        $product = $this->getDoctrine()->getRepository('IpfFrontBundle:Product')->findAll();
        return $this->render('IpfFrontBundle:Product:add.html.twig', array('products' => $product));
    }
}
