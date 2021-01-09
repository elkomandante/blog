<?php


namespace App\Service\Post;


use App\Entity\Post;
use App\Repository\PostRepositoryInterface;
use App\Service\Paginator\Paginator;


class PostService
{
    private $postRepository;
    private $paginator;

    public function __construct(PostRepositoryInterface $postRepository, Paginator $paginator)
    {
        $this->postRepository = $postRepository;
        $this->paginator = $paginator;
    }

    public function save(Post $post){
        $this->postRepository->save($post);
    }

    public function findAllPosts(): ?array
    {
        return $this->postRepository->findAll();
    }

    public function getPageOfPosts(int $page = 1, int $limit = 10)
    {
        return $this->paginator->paginateQuery(
          $this->postRepository->getPageOfPostsQueryBuilder(),
            $page,
            $limit
        );
    }

}