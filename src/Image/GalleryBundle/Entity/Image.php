<?php

namespace Image\GalleryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Entity(repositoryClass="Image\GalleryBundle\Entity\Repository\ImageRepository")
 * @ORM\Table(name="Image")
 * 
 * @JMS\ExclusionPolicy("all")
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @JMS\Expose
     * @JMS\Type("integer")
     */
    private $id;
    
    /**
     * @ORM\Column(name="name", type="string", length=255)
     *
     * @var string $name
     *
     * @JMS\Expose
     * @JMS\Type("string")
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Album", inversedBy="images")
     * @ORM\JoinColumn(name="album_id", referencedColumnName="id")
     *
     * @JMS\Expose
     * @JMS\Type("Album")
     */
    private $album;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Set album
     *
     * @param \Image\GalleryBundle\Entity\Album $album
     *
     * @return Album
     */
    public function setAlbum(\Image\GalleryBundle\Entity\Album $album = null)
    {
        $this->album = $album;

        return $this;
    }

    /**
     * Get album
     *
     * @return \Image\GalleryBundle\Entity\Album
     */
    public function getAlbum()
    {
        return $this->album;
    }


}
