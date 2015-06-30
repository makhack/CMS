<?php

namespace Ipf\FrontBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Ipf\FrontBundle\Entity\Product;
use Ipf\FrontBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Userproduct
 *
 * @ORM\Table(name="userproduct", indexes={@ORM\Index(name="FK_userproduct_user_idx", columns={"userProduct_user_id"}), @ORM\Index(name="FK_userproduct_product_idx", columns={"userProduct_product_id"})})
 * @ORM\Entity
 */
class Userproduct
{
    /**
     * @var integer
     *
     * @ORM\Column(name="userProduct_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userproductId;

    /**
     * @var integer
     *
     * @ORM\Column(name="userProduct_price", type="integer", nullable=false)
     */
    private $userproductPrice;

    /**
     * @var boolean
     *
     * @ORM\Column(name="userProduct_sold", type="boolean", nullable=false)
     */
    private $userproductSold;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="userProduct_saleDate", type="datetime", nullable=false)
     */
    private $userproductSaledate;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="userProduct_soldDate", type="datetime", nullable=true)
     */
    private $userproductSolddate;

    /**
     * @var string
     *
     * @ORM\Column(name="userProduct_description", type="text", nullable=false)
     */
    private $userproductDescription;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="userProduct_validated", type="boolean", nullable=true)
     */
    private $userproductValidated;

    /**
     * @var Product
     *
     * @ORM\ManyToOne(targetEntity="Product", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userProduct_product_id", referencedColumnName="product_id")
     * })
     */
    private $userproductProduct;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userProduct_user_id", referencedColumnName="user_id")
     * })
     */
    private $userproductUser;
    
    /**
     * Get userproductId
     *
     * @return integer 
     */
    public function getUserproductId()
    {
        return $this->userproductId;
    }

    /**
     * Set userproductPrice
     *
     * @param integer $userproductPrice
     * @return Userproduct
     */
    public function setUserproductPrice($userproductPrice)
    {
        $this->userproductPrice = $userproductPrice;

        return $this;
    }

    /**
     * Get userproductPrice
     *
     * @return integer 
     */
    public function getUserproductPrice()
    {
        return $this->userproductPrice;
    }

    /**
     * Set userproductSold
     *
     * @param boolean $userproductSold
     * @return Userproduct
     */
    public function setUserproductSold($userproductSold)
    {
        $this->userproductSold = $userproductSold;

        return $this;
    }

    /**
     * Get userproductSold
     *
     * @return boolean 
     */
    public function getUserproductSold()
    {
        return $this->userproductSold;
    }

    /**
     * Set userproductSaledate
     *
     * @param DateTime $userproductSaledate
     * @return Userproduct
     */
    public function setUserproductSaledate($userproductSaledate)
    {
        $this->userproductSaledate = $userproductSaledate;

        return $this;
    }

    /**
     * Get userproductSaledate
     *
     * @return DateTime 
     */
    public function getUserproductSaledate()
    {
        return $this->userproductSaledate;
    }

    /**
     * Set userproductSolddate
     *
     * @param DateTime $userproductSolddate
     * @return Userproduct
     */
    public function setUserproductSolddate($userproductSolddate)
    {
        $this->userproductSolddate = $userproductSolddate;

        return $this;
    }

    /**
     * Get userproductSolddate
     *
     * @return DateTime 
     */
    public function getUserproductSolddate()
    {
        return $this->userproductSolddate;
    }

    /**
     * Set userproductDescription
     *
     * @param string $userproductDescription
     * @return Userproduct
     */
    public function setUserproductDescription($userproductDescription)
    {
        $this->userproductDescription = $userproductDescription;

        return $this;
    }

    /**
     * Get userproductDescription
     *
     * @return string 
     */
    public function getUserproductDescription()
    {
        return $this->userproductDescription;
    }

    /**
     * Set userproductValidated
     *
     * @param boolean $userproductValidated
     * @return Userproduct
     */
    public function setUserproductValidated($userproductValidated)
    {
        $this->userproductValidated = $userproductValidated;

        return $this;
    }

    /**
     * Get userproductValidated
     *
     * @return boolean 
     */
    public function getUserproductValidated()
    {
        return $this->userproductValidated;
    }

    /**
     * Set userproductProduct
     *
     * @param Product $userproductProduct
     * @return Userproduct
     */
    public function setUserproductProduct(Product $userproductProduct = null)
    {
        $this->userproductProduct = $userproductProduct;

        return $this;
    }

    /**
     * Get userproductProduct
     *
     * @return Product 
     */
    public function getUserproductProduct()
    {
        return $this->userproductProduct;
    }

    /**
     * Set userproductUser
     *
     * @param User $userproductUser
     * @return Userproduct
     */
    public function setUserproductUser(User $userproductUser = null)
    {
        $this->userproductUser = $userproductUser;

        return $this;
    }

    /**
     * Get userproductUser
     *
     * @return User 
     */
    public function getUserproductUser()
    {
        return $this->userproductUser;
    }
}
