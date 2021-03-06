<?php



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
     * @ORM\Column(name="userProduct_validated", type="boolean", nullable=false)
     */
    private $userproductValidated;

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


}
