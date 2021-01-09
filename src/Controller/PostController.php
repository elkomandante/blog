<?php

namespace App\Controller;

use App\Entity\Post;
use App\Service\Post\PostService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param PostService $postService
     * @return Response
     */
    public function index(PostService $postService): Response
    {
        $posts = $postService->getPageOfPosts();

        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
            'posts' => $posts
        ]);
    }

    /**
     * @Route(path="/posts/{pageNumber}", name="post-list-front", requirements = {"pageNumber"= "\d+"})
     * @param PostService $postService
     * @return Response
     */
    public function postListFront($pageNumber, PostService $postService): Response
    {
        $posts = $postService->getPageOfPosts($pageNumber);

        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
            'posts' => $posts,
            'pageNumber' => $pageNumber
        ]);
    }

    /**
     * @Route(path="/posts/{slug}", name="single-post")
     * @param Post $post
     * @return Response
     */
    public function singlePost(Post $post): Response
    {
        return $this->render('post/single.html.twig', [
            'post' => $post
        ]);
    }
}
