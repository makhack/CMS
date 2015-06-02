<?php

namespace Ipf\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="category_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $categoryId;

    /**
     * @var string
     *
     * @ORM\Column(name="category_name", type="string", length=50, nullable=false)
     */
    private $categoryName;

    /**
     * @var string
     *
     * @ORM\Column(name="category_description", type="text", nullable=true)
     */
    private $categoryDescription;
    
    
    function getCategoryId() {
        return $this->categoryId;
    }

    function getCategoryName() {
        return $this->categoryName;
    }

    function getCategoryDescription() {
        return $this->categoryDescription;
    }

    function setCategoryId($categoryId) {
        $this->categoryId = $categoryId;
    }

    function setCategoryName($categoryName) {
        $this->categoryName = $categoryName;
    }

    function setCategoryDescription($categoryDescription) {
        $this->categoryDescription = $categoryDescription;
    }




}
