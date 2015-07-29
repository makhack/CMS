<?php
namespace Ipf\FrontBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Ipf\FrontBundle\Entity\Category;


class ProductRepository extends EntityRepository{
    
    public function searchByName($text){
        $product = $this->createQueryBuilder('p')
                ->where('p.productName LIKE :text')
                ->setParameter('text', '%'.$text.'%');
        return $product->getQuery()->getResult();
    }
    
}
