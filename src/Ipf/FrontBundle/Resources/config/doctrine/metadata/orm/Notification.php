<?php



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


}
