<?php


namespace App\EntityListener;


use App\Entity\Post;

class PostImageWebPathListener
{
    private $imageUploadWebDir;

    public function __construct($imageUploadWebDir)
    {
        $this->imageUploadWebDir = $imageUploadWebDir;
    }

    public function postLoad(Post $post)
    {
        $post->setImageWebLocation(sprintf("%s%s/%s", $this->imageUploadWebDir,Post::imageSubDir,$post->getImage()));
    }
}