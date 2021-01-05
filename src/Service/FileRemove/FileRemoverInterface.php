<?php


namespace App\Service\FileRemove;


interface FileRemoverInterface
{
    public function removeImage(string $imageFile, ?string $subdirectory):void;
}