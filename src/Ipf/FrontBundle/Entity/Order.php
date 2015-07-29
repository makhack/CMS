<?php

namespace Ipf\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table(name="order", uniqueConstraints={@ORM\UniqueConstraint(name="order_totalPrice_UNIQUE", columns={"order_totalPrice"})}, indexes={@ORM\Index(name="fk_user_buyer_idx", columns={"order_user_buyer_id"})})
 * @ORM\Entity
 */
class Order
{
    /**
     * @var integer
     *
     * @ORM\Column(name="order_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderId;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_totalPrice", type="integer", nullable=false)
     */
    private $orderTotalprice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="order_date", type="datetime", nullable=false)
     */
    private $orderDate;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_user_buyer_id", referencedColumnName="user_id")
     * })
     */
    private $orderUserBuyer;



    /**
     * Get orderId
     *
     * @return integer 
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set orderTotalprice
     *
     * @param integer $orderTotalprice
     * @return Order
     */
    public function setOrderTotalprice($orderTotalprice)
    {
        $this->orderTotalprice = $orderTotalprice;

        return $this;
    }

    /**
     * Get orderTotalprice
     *
     * @return integer 
     */
    public function getOrderTotalprice()
    {
        return $this->orderTotalprice;
    }

    /**
     * Set orderDate
     *
     * @param \DateTime $orderDate
     * @return Order
     */
    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    /**
     * Get orderDate
     *
     * @return \DateTime 
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * Set orderUserBuyer
     *
     * @param \Ipf\FrontBundle\Entity\User $orderUserBuyer
     * @return Order
     */
    public function setOrderUserBuyer(\Ipf\FrontBundle\Entity\User $orderUserBuyer = null)
    {
        $this->orderUserBuyer = $orderUserBuyer;

        return $this;
    }

    /**
     * Get orderUserBuyer
     *
     * @return \Ipf\FrontBundle\Entity\User 
     */
    public function getOrderUserBuyer()
    {
        return $this->orderUserBuyer;
    }
    
    public function __toString() {
        return $this->orderUserBuyer;
    }
}
