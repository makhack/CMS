<?php
namespace Ipf\FrontBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Ipf\FrontBundle\Entity\Category;
use Symfony\Component\HttpFoundation\Request;


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
    
    public function searchByProductName($text)
    {
        $userProducts = $this->createQueryBuilder('u')
            ->innerjoin('u.userproductProduct','p')
                ->where('p.productName LIKE :text')
                ->setParameter('text', '%'.$text.'%');
        return $userProducts->getQuery()->getResult();
    }
    
    public function findBySold($user)
    {
        $id = $user->getId();
        $userProductSold = $this->createQueryBuilder('u')
            ->where('u.userproductSold = :userproductSold')
            ->andWhere('u.userproductUser = :userproductUser')
            ->setParameters(array('userproductSold' => '1' ,'userproductUser' => $user));
        return $userProductSold->getQuery()->getResult();
            
    }
    
    

    
    public function findByAllSold($user)
    {
        
        $id = $user->getId();
        //$parameters = array('userproductSold' => '0' , 'userproductUser' => $user);
        $userProductAllSold = $this->createQueryBuilder('u')
            ->where('u.userproductSold = :userproductSold')
            ->andWhere('u.userproductUser = :userproductUser')
            ->setMaxResults(5)
            ->setParameters(array('userproductSold' => '1' , 'userproductUser' => $user));
        return $userProductAllSold->getQuery()->getResult();
            
    }
    
    
    
    public function findByInSale($user)
    {
        
        $id = $user->getId();
        //$parameters = array('userproductSold' => '0' , 'userproductUser' => $user);
        $userProductInSale = $this->createQueryBuilder('u')
            ->where('u.userproductSold = :userproductSold')
            ->andWhere('u.userproductUser = :userproductUser')
            ->setParameters(array('userproductSold' => '0' , 'userproductUser' => $user));
        return $userProductInSale->getQuery()->getResult();
            
    }
    
    
    
    
}
