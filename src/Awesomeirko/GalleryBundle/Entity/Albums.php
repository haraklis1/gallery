<?php

namespace Awesomeirko\GalleryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Albums
 *
 * @ORM\Table(name="albums")
 * @ORM\Entity
 */
class Albums
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="short_description", type="text", nullable=true)
     */
    private $shortDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="long_description", type="text", nullable=true)
     */
    private $longDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=false)
     */
    private $location;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="date", nullable=false)
     */
    private $dateCreated;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Albums
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set shortDescription
     *
     * @param string $shortDescription
     * @return Albums
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string 
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set longDescription
     *
     * @param string $longDescription
     * @return Albums
     */
    public function setLongDescription($longDescription)
    {
        $this->longDescription = $longDescription;

        return $this;
    }

    /**
     * Get longDescription
     *
     * @return string 
     */
    public function getLongDescription()
    {
        return $this->longDescription;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Albums
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Albums
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }
    
//    private $coverPhoto;
//    
//    /**
//     * Get coverPhoto
//     *
//     * @return Photos
//     */
//    public function getCoverPhoto()
//    {
//        $em = $this->getDoctrine()->getManager();
//        $entity = $em->getRepository('AwesomeirkoGalleryBundle:Photos')->findOneByAlbumId($this->id);
//     
//        var_dump($entity);
//        
//        $this->coverPhoto = $entity;
//        return $this->coverPhoto;
//    }
//    
//    /**
//     * Set coverPhoto
//     *
//     * @return Albums
//     */
//    public function setCoverPhoto()
//    {
//        $em = $this->getDoctrine()->getManager();
//        $entity = $em->getRepository('AwesomeirkoGalleryBundle:Photos')->findOneByAlbumId($this->id);
//     
//        var_dump($entity);
//        
//        $this->coverPhoto = $entity;
//        return $this;
//    }
}
