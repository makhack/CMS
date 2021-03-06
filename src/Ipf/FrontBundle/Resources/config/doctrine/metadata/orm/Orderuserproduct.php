<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Orderuserproduct
 *
 * @ORM\Table(name="orderuserproduct", indexes={@ORM\Index(name="fk_orderuserproduct_userproduct_idx", columns={"orderuserproduct_userProduct_id"}), @ORM\Index(name="fk_orderuserproduct_order_idx", columns={"orderuserproduct_order_id"})})
 * @ORM\Entity
 */
class Orderuserproduct
{
    /**
     * @var integer
     *
     * @ORM\Column(name="orderuserproduct_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderuserproductId;

    /**
     * @var \Order
     *
     * @ORM\ManyToOne(targetEntity="Order")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="orderuserproduct_order_id", referencedColumnName="order_id")
     * })
     */
    private $orderuserproductOrder;

    /**
     * @var \Userproduct
     *
     * @ORM\ManyToOne(targetEntity="Userproduct")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="orderuserproduct_userProduct_id", referencedColumnName="userProduct_id")
     * })
     */
    private $orderuserproductUserproduct;


}
