<?php

namespace Ipf\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_8D93D64992FC23A8", columns={"username_canonical"}), @ORM\UniqueConstraint(name="UNIQ_8D93D649A0D96FBF", columns={"email_canonical"})})
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    
    /**
     * @var string
     * @ORM\Column(name="city", type="string", length=150, nullable=true)
     */
    private $city;
    
    /**
     * @var string
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;
    
    /**
     * @var string
     * @ORM\Column(name="country", type="string", length=150, nullable=true)
     */
    private $country;
    
    /**
     * @var string
     * @ORM\Column(name="phone_number", type="string", length=15, nullable=true)
     */
    private $phoneNumber;
    
    /**
     * @var string
     * @ORM\Column(name="postal_code", type="string", length=10, nullable=true)
     */
    private $postalCode;

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    
    public function setCity($city)
    {
        $this->city = $city;
    }
    public function getCity()
    {
        return $this->city;
    }
    
    public function getAdress()
    {
        return $this->address;
    }
    
    public function setAdress($adress)
    {
        $this->address = $adress;
        return $this;
    }
    
    public function getCountry()
    {
        return $this->country;
    }
    
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }
    
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
    
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }
    
    public function getPostalCode()
    {
        return $this->postalCode;
    }
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
        return $this;
    }
}
