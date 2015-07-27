<?php

namespace Ipf\FrontBundle\Entity;

use Ipf\FrontBundle\Entity\Product;
/* 
 *
 */
class Cart{

    private $produits;
    private $session;
    
    public function __construct($request) {
        $this->session = $request->getSession();
        $this->produits = array();
        if($this->session->get('cartElements')){
            $this->produits = $this->session->get('cartElements');
        }
    }
    
    public function add(Userproduct $product){
        $productKey = $product->getUserproductId();
        $this->produits[$productKey] = $product;
        $this->session->set('cartElements', $this->produits);
    }
    
    public function remove($productKey){
        unset($this->produits[$productKey]);
        $this->session->set('cartElements', $this->produits);
    }
    
    public function getPanier(){
        return $this->produits;
    }
    
    public function getUserProduct($productKey){
        return $this->produits[$productKey];
    }
    
    
}
