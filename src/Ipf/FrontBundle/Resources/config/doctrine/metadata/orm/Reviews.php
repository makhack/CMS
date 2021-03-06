<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Reviews
 *
 * @ORM\Table(name="reviews", indexes={@ORM\Index(name="fk_review_user_idx", columns={"reviews_user_id"})})
 * @ORM\Entity
 */
class Reviews
{
    /**
     * @var integer
     *
     * @ORM\Column(name="reviews_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reviewsId;

    /**
     * @var string
     *
     * @ORM\Column(name="reviews_description", type="text", nullable=false)
     */
    private $reviewsDescription;

    /**
     * @var boolean
     *
     * @ORM\Column(name="reviews_mark", type="boolean", nullable=false)
     */
    private $reviewsMark;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reviews_user_id", referencedColumnName="user_id")
     * })
     */
    private $reviewsUser;


}
