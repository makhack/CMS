<?php

namespace Ipf\FrontBundle\Entity;

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



    /**
     * Get reviewsId
     *
     * @return integer 
     */
    public function getReviewsId()
    {
        return $this->reviewsId;
    }

    /**
     * Set reviewsDescription
     *
     * @param string $reviewsDescription
     * @return Reviews
     */
    public function setReviewsDescription($reviewsDescription)
    {
        $this->reviewsDescription = $reviewsDescription;

        return $this;
    }

    /**
     * Get reviewsDescription
     *
     * @return string 
     */
    public function getReviewsDescription()
    {
        return $this->reviewsDescription;
    }

    /**
     * Set reviewsMark
     *
     * @param boolean $reviewsMark
     * @return Reviews
     */
    public function setReviewsMark($reviewsMark)
    {
        $this->reviewsMark = $reviewsMark;

        return $this;
    }

    /**
     * Get reviewsMark
     *
     * @return boolean 
     */
    public function getReviewsMark()
    {
        return $this->reviewsMark;
    }

    /**
     * Set reviewsUser
     *
     * @param \Ipf\FrontBundle\Entity\User $reviewsUser
     * @return Reviews
     */
    public function setReviewsUser(\Ipf\FrontBundle\Entity\User $reviewsUser = null)
    {
        $this->reviewsUser = $reviewsUser;

        return $this;
    }

    /**
     * Get reviewsUser
     *
     * @return \Ipf\FrontBundle\Entity\User 
     */
    public function getReviewsUser()
    {
        return $this->reviewsUser;
    }
}
