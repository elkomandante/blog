<?php


namespace App\ImageUpload;


use Symfony\Component\HttpFoundation\File\UploadedFile;

interface ImageUploadInterface
{
    public function upload(UploadedFile $uploadedFile, ?string $uploadsSubdirectory) :string;
}