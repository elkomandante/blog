<?php


namespace App\Controller\Admin;


use App\Entity\Post;
use App\Form\PostType;
use App\ImageUpload\ImageUploadInterface;
use App\Service\FileRemove\FileRemoverInterface;
use App\Service\Post\PostService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{


    /**
     * @Route(path="/admin/", name = "admin_index")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }


    /**
     * @Route(path="/admin/post-add", name="post-add")
     * @param Request $request
     * @param PostService $postService
     * @param ImageUploadInterface $imageUpload
     * @return RedirectResponse|Response
     */
    public function addPost(
        Request $request,
        PostService $postService,
        ImageUploadInterface $imageUpload
    ){
        $form = $this->createForm(PostType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            /*** @var $post Post */
            $post = $form->getData();
            $imageFile = $form['imageFile']->getData();
            if($imageFile instanceof UploadedFile){
                $post->setImage($imageUpload->upload($imageFile, Post::imageSubDir));
            }
            $postService->save($post);

            return  new RedirectResponse($this->generateUrl('post-edit', [
                'id' => $post->getId()
            ]));
        }

        return $this->render('admin/post/post.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route(path="/admin/post/{id}", name="post-edit")
     * @param Request $request
     * @param Post $post
     * @param PostService $postService
     * @param FileRemoverInterface $fileRemover
     * @param ImageUploadInterface $imageUpload
     * @return Response
     */
    public function postEdit(
        Request $request,
        Post $post,
        PostService $postService,
        FileRemoverInterface $fileRemover,
        ImageUploadInterface $imageUpload
    ) : Response {
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            if($form['imageFile']){
                if($post->getImage()){
                    $fileRemover->removeImage($post->getImage(),Post::imageSubDir);
                }
                $post->setImage($imageUpload->upload($form['imageFile']->getData(),Post::imageSubDir));
            }
            $postService->save($post);
        }

        return $this->render('admin/post/post.html.twig', [
            'form' => $form->createView(),
            'post' => $post,
            'edit' => true
        ]);
    }

    /**
     * @Route (path="/admin/posts", name="post-list")
     * @param PostService $postService
     * @return Response
     */
    public function postList(
        PostService $postService
    ): Response {
        $posts = $postService->findAllPosts();
        return $this->render('admin/post/list.html.twig', [
            'posts' => $posts
        ]);
    }

}