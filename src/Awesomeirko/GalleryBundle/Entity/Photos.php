<?php

namespace Awesomeirko\GalleryBundle\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Photos
 *
 * @ORM\Table(name="photos")
 * @ORM\Entity
 */
class Photos {

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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_album_cover", type="boolean", nullable=true)
     */
    private $isAlbumCover = false;

    /**
     * @var integer
     *
     * @ORM\Column(name="album_id", type="integer", nullable=false)
     */
    private $albumId;

    /**
     * @var integer
     *
     * @ORM\Column(name="image_width", type="integer", nullable=false)
     */
    private $imageWidth;

    /**
     * @var integer
     *
     * @ORM\Column(name="image_height", type="integer", nullable=false)
     */
    private $imageHeight;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Photos
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Photos
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set isAlbumCover
     *
     * @param boolean $isAlbumCover
     * @return Photos
     */
    public function setIsAlbumCover($isAlbumCover) {
        $this->isAlbumCover = $isAlbumCover;

        return $this;
    }

    /**
     * Get isAlbumCover
     *
     * @return boolean 
     */
    public function getIsAlbumCover() {
        return $this->isAlbumCover;
    }

    /**
     * Set imageWidth
     *
     * @param integer $imageWidth
     * @return Photos
     */
    public function setImageWidth($imageWidth) {
        $this->imageWidth = $imageWidth;

        return $this;
    }

    /**
     * Get imageWidth
     *
     * @return integer 
     */
    public function getImageWidth() {
        return $this->imageWidth;
    }

    /**
     * Set imageHeight
     *
     * @param integer $imageHeight
     * @return Photos
     */
    public function setImageHeight($imageHeight) {
        $this->imageHeight = $imageHeight;

        return $this;
    }

    /**
     * Get imageHeight
     *
     * @return integer 
     */
    public function getImageHeight() {
        return $this->imageHeight;
    }

    /**
     * Set albumId
     *
     * @param integer $albumId
     * @return Photos
     */
    public function setAlbumId($albumId) {
        $this->albumId = $albumId;

        return $this;
    }

    /**
     * Get albumId
     *
     * @return integer 
     */
    public function getAlbumId() {
        return $this->albumId;
    }

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path;

    /**
     * Set path
     *
     * @param string $path
     * @return Photos
     */
    public function setPath($path) {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath() {
        return $this->path;
    }

    public function getAbsolutePath() {
        return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
    }

    public function getWebPath() {
        return null === $this->path ? null : $this->getUploadDir() . '/' . $this->path;
    }

    protected function getUploadRootDir() {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/photos';
    }

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null) {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile() {
        return $this->file;
    }

    public function upload() {
        if (null === $this->getFile()) {
            return;
        }

        //$size = $this->getFile()->getSize();
        
        
        $size = getimagesize($this->getFile()->getPathname());
        //var_dump($size);
        
        $valid_types = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP);

        if (!in_array($size[2], $valid_types)) {
            $this->path = null;
            return;
        } 

        
        $name = uniqid();
        $this->getFile()->move(
                $this->getUploadRootDir(), $name . "." . $this->getFile()->getClientOriginalName()
        );


        
        $this->imageWidth = $size[0];
        $this->imageHeight = $size[1];

        $this->path = $name . "." . $this->getFile()->getClientOriginalName();
        $this->file = null;
    }

}
