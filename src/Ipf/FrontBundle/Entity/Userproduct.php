<?php

namespace Ipf\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var \DateTime
     *
     * @ORM\Column(name="userProduct_saleDate", type="datetime", nullable=false)
     */
    private $userproductSaledate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="userProduct_soldDate", type="datetime", nullable=false)
     */
    private $userproductSolddate;

    /**
     * @var string
     *
     * @ORM\Column(name="userProduct_description", type="text", nullable=false)
     */
    private $userproductDescription;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userProduct_product_id", referencedColumnName="product_id")
     * })
     */
    private $userproductProduct;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userProduct_user_id", referencedColumnName="user_id")
     * })
     */
    private $userproductUser;
    
    function getUserproductId() {
        return $this->userproductId;
    }

    function getUserproductPrice() {
        return $this->userproductPrice;
    }

    function getUserproductSold() {
        return $this->userproductSold;
    }

    function getUserproductSaledate() {
        return $this->userproductSaledate;
    }

    function getUserproductSolddate() {
        return $this->userproductSolddate;
    }

    function getUserproductDescription() {
        return $this->userproductDescription;
    }

    function getUserproductProduct() {
        return $this->userproductProduct;
    }

    function getUserproductUser() {
        return $this->userproductUser;
    }

    function setUserproductId($userproductId) {
        $this->userproductId = $userproductId;
    }

    function setUserproductPrice($userproductPrice) {
        $this->userproductPrice = $userproductPrice;
    }

    function setUserproductSold($userproductSold) {
        $this->userproductSold = $userproductSold;
    }

    function setUserproductSaledate(\DateTime $userproductSaledate) {
        $this->userproductSaledate = $userproductSaledate;
    }

    function setUserproductSolddate(\DateTime $userproductSolddate) {
        $this->userproductSolddate = $userproductSolddate;
    }

    function setUserproductDescription($userproductDescription) {
        $this->userproductDescription = $userproductDescription;
    }

    function setUserproductProduct(\Product $userproductProduct) {
        $this->userproductProduct = $userproductProduct;
    }

    function setUserproductUser(\User $userproductUser) {
        $this->userproductUser = $userproductUser;
    }




}
