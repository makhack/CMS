<?php

namespace Ipf\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\File(maxSize="6000000")
     * @Assert\NotBlank()
     */
    public $file;

    /**
     * @var string
     *
     * @ORM\Column(name="picture_url", type="string", length=255, nullable=false)
     */
    private $pictureUrl;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="pictures", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="picture_productid", referencedColumnName="product_id")
     * })
     */
    private $pictureProductid;

     public function getAbsolutePath()
    {
        return null === $this->pictureUrl ? null : $this->getUploadRootDir().'/'.$this->pictureUrl;
    }

    public function getWebPath()
    {
        return null === $this->pictureUrl ? null : $this->getUploadDir().'/'.$this->pictureUrl;
    }

    protected function getUploadRootDir()
    {
        // le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
        // le document/image dans la vue.
        return 'bundles/Ipf/images';
    }
    public function upload()
    {
        // la propriété « file » peut être vide si le champ n'est pas requis
        var_dump($this->file);
        if (null === $this->file) {
            return;
        }

    
        $imageName = sha1(uniqid(mt_rand(), true)).'.'.$this->file->guessExtension();
    
        
        
        
        // utilisez le nom de fichier original ici mais
        // vous devriez « l'assainir » pour au moins éviter
        // quelconques problèmes de sécurité

        // la méthode « move » prend comme arguments le répertoire cible et
        // le nom de fichier cible où le fichier doit être déplacé
        $this->file->move($this->getUploadRootDir(), $imageName );

        // définit la propriété « path » comme étant le nom de fichier où vous
        // avez stocké le fichier
        $format = '%s/%s';
        var_dump(sprintf($format, $this->getUploadDir(), $imageName ));
        $this->setPictureUrl(sprintf($format, $this->getUploadDir(), $imageName));

        // « nettoie » la propriété « file » comme vous n'en aurez plus besoin
        $this->file = null;
    }
    // GETS / SETTEURS
    /**
     * Get pictureId
     *
     * @return integer 
     */
    public function getPictureId()
    {
        return $this->pictureId;
    }

    /**
     * Set pictureUrl
     *
     * @param string $pictureUrl
     * @return Picture
     */
    public function setPictureUrl($pictureUrl)
    {
        $this->pictureUrl = $pictureUrl;

        return $this;
    }

    /**
     * Get pictureUrl
     *
     * @return string 
     */
    public function getPictureUrl()
    {
        return $this->pictureUrl;
    }

    /**
     * Set pictureProductid
     *
     * @param \Ipf\FrontBundle\Entity\Product $pictureProductid
     * @return Picture
     */
    public function setPictureProductid(\Ipf\FrontBundle\Entity\Product $pictureProductid = null)
    {
        $this->pictureProductid = $pictureProductid;

        return $this;
    }

    /**
     * Get pictureProductid
     *
     * @return \Ipf\FrontBundle\Entity\Product 
     */
    public function getPictureProductid()
    {
        return $this->pictureProductid;
    }
    
//    public function __toString() {
//        return $this->file;
//    }
}
