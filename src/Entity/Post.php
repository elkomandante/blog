<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class Post
{

    const imageSubDir = 'post';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column (type="text")
     */
    private $excerpt;

    /**
     * @ORM\Column (type="boolean")
     */
    private $isPublished;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;


    /**
     * @ORM\Column (type="string", nullable=true)
     */
    private $thumbnailImage;

    private $imageWebLocation;

    private $thumbnailImageWebLocation;


    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $timeAdded;

    /**
     * @Gedmo\Timestampable(on="change", field="isPublished", value="true")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $timePublished;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getTimeAdded(): ?\DateTimeInterface
    {
        return $this->timeAdded;
    }

    public function setTimeAdded(\DateTimeInterface $timeAdded): self
    {
        $this->timeAdded = $timeAdded;

        return $this;
    }

    public function getTimePublished(): ?\DateTimeInterface
    {
        return $this->timePublished;
    }

    public function setTimePublished(?\DateTimeInterface $timePublished): self
    {
        $this->timePublished = $timePublished;

        return $this;
    }


    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImageWebLocation()
    {
        return $this->imageWebLocation;
    }

    /**
     * @param mixed $imageWebLocation
     */
    public function setImageWebLocation($imageWebLocation): void
    {
        $this->imageWebLocation = $imageWebLocation;
    }

    /**
     * @return mixed
     */
    public function getExcerpt()
    {
        return $this->excerpt;
    }

    /**
     * @param mixed $excerpt
     */
    public function setExcerpt($excerpt): void
    {
        $this->excerpt = $excerpt;
    }

    /**
     * @return mixed
     */
    public function getThumbnailImage()
    {
        return $this->thumbnailImage;
    }

    /**
     * @param mixed $thumbnailImage
     */
    public function setThumbnailImage($thumbnailImage): void
    {
        $this->thumbnailImage = $thumbnailImage;
    }

    /**
     * @return mixed
     */
    public function getThumbnailImageWebLocation()
    {
        return $this->thumbnailImageWebLocation;
    }

    /**
     * @param mixed $thumbnailImageWebLocation
     */
    public function setThumbnailImageWebLocation($thumbnailImageWebLocation): void
    {
        $this->thumbnailImageWebLocation = $thumbnailImageWebLocation;
    }

    /**
     * @return mixed
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * @param mixed $isPublished
     */
    public function setIsPublished($isPublished): void
    {
        $this->isPublished = $isPublished;
    }

}
