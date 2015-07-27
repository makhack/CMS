<?php
namespace Ipf\FrontBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Ipf\FrontBundle\Entity\Category;


class UserProductRepository extends EntityRepository{
    
    public function findByCategory(Category $category)
    {
        $userProductCategory = $this->createQueryBuilder('u')
            ->innerjoin('u.userproductProduct','p')
            ->innerjoin('p.productCategory','c')
            ->where('c.categoryId = :categoryid')
            ->setParameter('categoryid', $category->getCategoryId());
        return $userProductCategory->getQuery()->getResult();
            
    }
    
    public function findBySold()
    {
        $userProductCategory = $this->createQueryBuilder('u')
            ->where('u.userproductSold = :userProduct_sold')
            ->setParameter('userProduct_sold', '1');
        return $userProductCategory->getQuery()->getResult();
            
    }
    
}
