<?php

namespace Image\GalleryBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Entity(repositoryClass="Image\GalleryBundle\Entity\Repository\AlbumRepository")
 * @ORM\Table(name="Album")
 *
 * @JMS\ExclusionPolicy("all")
 */
class Album
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
     * @ORM\OneToMany(targetEntity="Image", mappedBy="album")
     *
     * @JMS\Expose
     * @JMS\Type("ArrayCollection<Image>")
     */
    private $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();

    }
    
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
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     * @param mixed $images
     */
    public function setImages($images)
    {
        $this->images = $images;
        return $this;
    }

//
//    /**
//     * Add image
//     *
//     * @param \Image\GalleryBundle\Entity\Image $image
//     *
//     * @return Album
//     */
//    public function addImage(\Image\GalleryBundle\Entity\Image $image)
//    {
//        $this->images[] = $image;
//
//        return $this;
//    }
//
//    /**
//     * Remove image
//     *
//     * @param \Image\GalleryBundle\Entity\Image $image
//     */
//    public function removeImage(\Image\GalleryBundle\Entity\Image $image)
//    {
//        $this->images->removeElement($image);
//    }

}
