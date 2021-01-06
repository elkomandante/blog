<?php


namespace App\Service\Post;


use App\Entity\Post;
use App\Repository\PostRepositoryInterface;
use Doctrine\Common\Collections\Collection;

class PostService
{
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function save(Post $post){
        $this->postRepository->save($post);
    }

    public function findAllPosts(): ?array
    {
        return $this->postRepository->findAll();
    }
}