<?php

namespace Ipf\FrontBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Ipf\FrontBundle\Entity\Category;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="FK_category_idx", columns={"product_category_id"})})
 * @ORM\Entity
 */
class Product
{
    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productId;

    /**
     * @var string
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="product_name", type="string", length=255, nullable=false)
     */
    private $productName;

    /**
     * @var Category
     * @Assert\NotBlank()
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_category_id", referencedColumnName="category_id")
     * })
     */
    private $productCategory;
    
    /**
     *
     * @var type 
     * 
     * @ORM\OneToMany(targetEntity="Picture", mappedBy="pictureProductid", cascade={"persist"})
     */
    private $pictures;
    
    function __construct() {
        $this->pictures = new ArrayCollection();
    }

    function getPictures() {
        return $this->pictures;
    }

    function setPictures(ArrayCollection $pictures) {
        $this->pictures = $pictures;
    }

    


    /**
     * Get productId
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set productName
     *
     * @param string $productName
     * @return Product
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * Get productName
     *
     * @return string 
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set productCategory
     *
     * @param Category $productCategory
     * @return Product
     */
    public function setProductCategory(Category $productCategory = null)
    {
        $this->productCategory = $productCategory;

        return $this;
    }

    /**
     * Get productCategory
     *
     * @return Category 
     */
    public function getProductCategory()
    {
        return $this->productCategory;
    }
    
    /**
    * toString
    * @return string
    */
   public function __toString() 
   {
       return $this->getProductName();
   }
}
