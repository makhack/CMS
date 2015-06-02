<?php

namespace Ipf\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     *
     * @ORM\Column(name="product_name", type="string", length=255, nullable=false)
     */
    private $productName;

    /**
     * @var string
     *
     * @ORM\Column(name="product_description", type="text", nullable=false)
     */
    private $productDescription;

    /**
     * @var boolean
     *
     * @ORM\Column(name="product_validated", type="boolean", nullable=false)
     */
    private $productValidated;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_category_id", referencedColumnName="category_id")
     * })
     */
    private $productCategory;

    function getProductId() {
        return $this->productId;
    }

    function getProductName() {
        return $this->productName;
    }

    function getProductDescription() {
        return $this->productDescription;
    }

    function getProductValidated() {
        return $this->productValidated;
    }

    function getProductCategory() {
        return $this->productCategory;
    }

    function setProductId($productId) {
        $this->productId = $productId;
    }

    function setProductName($productName) {
        $this->productName = $productName;
    }

    function setProductDescription($productDescription) {
        $this->productDescription = $productDescription;
    }

    function setProductValidated($productValidated) {
        $this->productValidated = $productValidated;
    }

    function setProductCategory(\Category $productCategory) {
        $this->productCategory = $productCategory;
    }



}
