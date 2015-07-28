<?php
namespace Ipf\FrontBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Ipf\FrontBundle\Entity\Category;


class ProductRepository extends EntityRepository{
    
    public function findByCategory(Category $category)
    {
        $productCategory = $this->createQueryBuilder('p')
            ->innerjoin('p.productCategory','c')
            ->where('c.categoryId = :categoryid')
            ->setParameter('categoryid', $category->getCategoryId());
        return $productCategory->getQuery()->getResult();
    }
    
}
