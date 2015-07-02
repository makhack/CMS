<?php

namespace Ipf\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producttag
 *
 * @ORM\Table(name="producttag", indexes={@ORM\Index(name="FK_productTag_product_idx", columns={"productTag_product_id"}), @ORM\Index(name="FK_productTag_tag_idx", columns={"productTag_tag_id"})})
 * @ORM\Entity
 */
class Producttag
{
    /**
     * @var integer
     *
     * @ORM\Column(name="productTag_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $producttagId;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="productTag_product_id", referencedColumnName="product_id")
     * })
     */
    private $producttagProduct;

    /**
     * @var \Tag
     *
     * @ORM\ManyToOne(targetEntity="Tag")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="productTag_tag_id", referencedColumnName="tag_id")
     * })
     */
    private $producttagTag;



    /**
     * Get producttagId
     *
     * @return integer 
     */
    public function getProducttagId()
    {
        return $this->producttagId;
    }

    /**
     * Set producttagProduct
     *
     * @param \Ipf\FrontBundle\Entity\Product $producttagProduct
     * @return Producttag
     */
    public function setProducttagProduct(\Ipf\FrontBundle\Entity\Product $producttagProduct = null)
    {
        $this->producttagProduct = $producttagProduct;

        return $this;
    }

    /**
     * Get producttagProduct
     *
     * @return \Ipf\FrontBundle\Entity\Product 
     */
    public function getProducttagProduct()
    {
        return $this->producttagProduct;
    }

    /**
     * Set producttagTag
     *
     * @param \Ipf\FrontBundle\Entity\Tag $producttagTag
     * @return Producttag
     */
    public function setProducttagTag(\Ipf\FrontBundle\Entity\Tag $producttagTag = null)
    {
        $this->producttagTag = $producttagTag;

        return $this;
    }

    /**
     * Get producttagTag
     *
     * @return \Ipf\FrontBundle\Entity\Tag 
     */
    public function getProducttagTag()
    {
        return $this->producttagTag;
    }
}
