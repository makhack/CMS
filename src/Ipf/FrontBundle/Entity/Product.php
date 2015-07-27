<?php

namespace Ipf\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Ipf\FrontBundle\Entity\Category;
use Ipf\FrontBundle\Entity\Picture;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * Product
 * 
 * @ORM\Table(name="product", indexes={@ORM\Index(name="FK_category_idx", columns={"product_category_id"})})
 * @ORM\Entity
 * @ExclusionPolicy("all")
 */
class Product
{
    /**
     * @var integer
     * @Expose
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productId;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Expose
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
     * @var type 
     * @Expose
     * @ORM\OneToMany(targetEntity="Picture", mappedBy="pictureProductid", cascade={"persist"})
     */
    private $pictures;
    
    private $tags;

    function __construct() {
        $this->pictures = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }
    
    function setTags($tags){
        $this->tags = is_array($tags) ? new ArrayCollection($tags) : $tags;
    }
    
    function getTags(){
        return $this->tags;
    }
    
    function getPictures() {
        return $this->pictures;
    }

    function setPictures($pictures) {
        $this->pictures = is_array($pictures) ? new ArrayCollection($pictures) : $pictures;
    }

    


    /**
     * Get productId
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

    /**
     * Add pictures
     *
     * @param \Ipf\FrontBundle\Entity\Picture $pictures
     * @return Product
     */
    public function addPicture(\Ipf\FrontBundle\Entity\Picture $pictures)
    {
        $this->pictures[] = $pictures;

        return $this;
    }

    /**
     * Remove pictures
     *
     * @param \Ipf\FrontBundle\Entity\Picture $pictures
     */
    public function removePicture(\Ipf\FrontBundle\Entity\Picture $pictures)
    {
        $this->pictures->removeElement($pictures);
    }
}
