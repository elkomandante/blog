<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class Post
{
    use TimestampableEntity;
    use PageMetaFriendlyEntity;

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
     * @ORM\Column (type="boolean", nullable=true)
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

    public function getSlug()
    {
        return $this->slug;
    }


    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }


    public function getImage(): ?string
    {
        return $this->image;
    }


    public function setImage(string $image): void
    {
        $this->image = $image;
    }


    public function getImageWebLocation(): ?string
    {
        return $this->imageWebLocation;
    }


    public function setImageWebLocation(string $imageWebLocation): void
    {
        $this->imageWebLocation = $imageWebLocation;
    }


    public function getExcerpt(): ?string
    {
        return $this->excerpt;
    }


    public function setExcerpt(string $excerpt): void
    {
        $this->excerpt = $excerpt;
    }


    public function getThumbnailImage(): ?string
    {
        return $this->thumbnailImage;
    }


    public function setThumbnailImage(string $thumbnailImage): void
    {
        $this->thumbnailImage = $thumbnailImage;
    }


    public function getThumbnailImageWebLocation(): ?string
    {
        return $this->thumbnailImageWebLocation;
    }


    public function setThumbnailImageWebLocation(string $thumbnailImageWebLocation): void
    {
        $this->thumbnailImageWebLocation = $thumbnailImageWebLocation;
    }

    public function getIsPublished(): bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): void
    {
        $this->isPublished = $isPublished;
    }

}
