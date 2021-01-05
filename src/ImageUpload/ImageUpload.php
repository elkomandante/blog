<?php


namespace App\ImageUpload;


use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class ImageUpload implements ImageUploadInterface
{
    private $imageUploadDir;

    private $slugger;

    public function __construct($imageUploadDir, SluggerInterface $slugger)
    {
        $this->imageUploadDir = $imageUploadDir;
        $this->slugger = $slugger;
    }

    public function upload(UploadedFile $uploadedFile, ?string $uploadsSubdirectory): string
    {
        $originalFileName = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFileName = $this->slugger->slug($originalFileName);
        $newFilename = $safeFileName.'-'.uniqid().'.'.$uploadedFile->guessExtension();
        $uploadLocation = sprintf("%s%s", $this->imageUploadDir, $uploadsSubdirectory ?? '');
        $uploadedFile->move(
          $uploadLocation,
          $newFilename
        );

        return $newFilename;
    }
}