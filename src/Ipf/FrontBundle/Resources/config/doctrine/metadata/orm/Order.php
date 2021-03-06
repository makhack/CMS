<?php



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
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_user_buyer_id", referencedColumnName="user_id")
     * })
     */
    private $orderUserBuyer;


}
