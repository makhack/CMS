<?php



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


}
