<?php

namespace Ipf\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notification
 *
 * @ORM\Table(name="notification", indexes={@ORM\Index(name="fk_notif_user_idx", columns={"notification_user_id"})})
 * @ORM\Entity
 */
class Notification
{
    /**
     * @var integer
     *
     * @ORM\Column(name="notification_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $notificationId;

    /**
     * @var string
     *
     * @ORM\Column(name="notification_description", type="text", nullable=false)
     */
    private $notificationDescription;

    /**
     * @var boolean
     *
     * @ORM\Column(name="notification_expired", type="boolean", nullable=false)
     */
    private $notificationExpired;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="notification_user_id", referencedColumnName="user_id")
     * })
     */
    private $notificationUser;



    /**
     * Get notificationId
     *
     * @return integer 
     */
    public function getNotificationId()
    {
        return $this->notificationId;
    }

    /**
     * Set notificationDescription
     *
     * @param string $notificationDescription
     * @return Notification
     */
    public function setNotificationDescription($notificationDescription)
    {
        $this->notificationDescription = $notificationDescription;

        return $this;
    }

    /**
     * Get notificationDescription
     *
     * @return string 
     */
    public function getNotificationDescription()
    {
        return $this->notificationDescription;
    }

    /**
     * Set notificationExpired
     *
     * @param boolean $notificationExpired
     * @return Notification
     */
    public function setNotificationExpired($notificationExpired)
    {
        $this->notificationExpired = $notificationExpired;

        return $this;
    }

    /**
     * Get notificationExpired
     *
     * @return boolean 
     */
    public function getNotificationExpired()
    {
        return $this->notificationExpired;
    }

    /**
     * Set notificationUser
     *
     * @param \Ipf\FrontBundle\Entity\User $notificationUser
     * @return Notification
     */
    public function setNotificationUser(\Ipf\FrontBundle\Entity\User $notificationUser = null)
    {
        $this->notificationUser = $notificationUser;

        return $this;
    }

    /**
     * Get notificationUser
     *
     * @return \Ipf\FrontBundle\Entity\User 
     */
    public function getNotificationUser()
    {
        return $this->notificationUser;
    }
}
