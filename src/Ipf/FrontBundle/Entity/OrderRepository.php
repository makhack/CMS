<?php
namespace Ipf\FrontBundle\Entity;

use Doctrine\ORM\EntityRepository;

use Ipf\FrontBundle\Entity\Category;
use Symfony\Component\HttpFoundation\Request;


class OrderRepository extends EntityRepository{
    
//    public function findByCategory(Category $category)
//    {
//        $userProductCategory = $this->createQueryBuilder('u')
//            ->innerjoin('u.userproductProduct','p')
//            ->innerjoin('p.productCategory','c')
//            ->where('c.categoryId = :categoryid')
//            ->setParameter('categoryid', $category->getCategoryId());
//        return $userProductCategory->getQuery()->getResult();
//            
//    }
//    
//    public function searchByProductName($text)
//    {
//        $userProducts = $this->createQueryBuilder('u')
//            ->innerjoin('u.userproductProduct','p')
//                ->where('p.productName LIKE :text')
//                ->setParameter('text', '%'.$text.'%');
//        return $userProducts->getQuery()->getResult();
//    }
//    
//    public function findBySold($user)
//    {
//        $id = $user->getId();
//        $userProductSold = $this->createQueryBuilder('u')
//            ->where('u.userproductSold = :userProduct_sold')
//            ->where('u.userproductUser = :userproductUser')
//            ->setParameter('userproductUser', $user);
//        return $userProductSold->getQuery()->getResult();
//            
//    }
    
//    public function findByorderUserBuyer($user)
//    {
//        $id = $user->getId();
//        $userProductBought = $this->createQueryBuilder('o')
//            ->where('o.orderUserBuyer = :orderUserBuyer')
//            ->setParameter('orderUserBuyer', $user);
//        return $userProductBought->getQuery()->getResult();
//            
//    }
    
   
    
    
    
}
