<?php



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


}
