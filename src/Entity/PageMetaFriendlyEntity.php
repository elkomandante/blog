<?php


namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

trait PageMetaFriendlyEntity
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $metaTitle;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $metaDescription;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $metaKeywords;

    /**
     * @return mixed
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    /**
     * @param mixed $metaTitle
     */
    public function setMetaTitle($metaTitle): void
    {
        $this->metaTitle = $metaTitle;
    }

    /**
     * @return mixed
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * @param mixed $metaDescription
     */
    public function setMetaDescription($metaDescription): void
    {
        $this->metaDescription = $metaDescription;
    }

    /**
     * @return mixed
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * @param mixed $metaKeywords
     */
    public function setMetaKeywords($metaKeywords): void
    {
        $this->metaKeywords = $metaKeywords;
    }

}