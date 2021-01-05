<?php


namespace App\Service\FileRemove;


use Symfony\Component\Filesystem\Filesystem;

class FileRemover implements FileRemoverInterface
{
    private $filesystem;
    private $imageUploadDir;

    public function __construct(Filesystem $filesystem, $imageUploadDir)
    {
        $this->filesystem = $filesystem;
        $this->imageUploadDir = $imageUploadDir;
    }

    public function removeImage(string $imageFile, ?string $subdirectory): void
    {
        $imageFileLocation = sprintf("%s%s/%s", $this->imageUploadDir, $subdirectory ?? '', $imageFile);
        if($this->filesystem->exists($imageFileLocation)){
            $this->filesystem->remove($imageFileLocation);
        }
    }
}