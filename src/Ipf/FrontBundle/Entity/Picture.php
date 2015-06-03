<?php

namespace Ipf\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Picture
 *
 * @ORM\Table(name="picture", indexes={@ORM\Index(name="fk_picture_product_id_idx", columns={"picture_productid"})})
 * @ORM\Entity
 */
class Picture
{
    /**
     * @var integer
     *
     * @ORM\Column(name="picture_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pictureId;

    /**
     * @var string
     *
     * @ORM\Column(name="picture_url", type="string", length=255, nullable=false)
     */
    private $pictureUrl;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="picture_productid", referencedColumnName="product_id")
     * })
     */
    private $pictureProductid;



    /**
     * Get pictureId
     *
     * @return integer 
     */
    public function getPictureId()
    {
        return $this->pictureId;
    }

    /**
     * Set pictureUrl
     *
     * @param string $pictureUrl
     * @return Picture
     */
    public function setPictureUrl($pictureUrl)
    {
        $this->pictureUrl = $pictureUrl;

        return $this;
    }

    /**
     * Get pictureUrl
     *
     * @return string 
     */
    public function getPictureUrl()
    {
        return $this->pictureUrl;
    }

    /**
     * Set pictureProductid
     *
     * @param \Ipf\FrontBundle\Entity\Product $pictureProductid
     * @return Picture
     */
    public function setPictureProductid(\Ipf\FrontBundle\Entity\Product $pictureProductid = null)
    {
        $this->pictureProductid = $pictureProductid;

        return $this;
    }

    /**
     * Get pictureProductid
     *
     * @return \Ipf\FrontBundle\Entity\Product 
     */
    public function getPictureProductid()
    {
        return $this->pictureProductid;
    }
}
