<?php


namespace App\DataFixtures;


use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PostFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 1; $i < 500; $i++){
            $post = new Post();
            $post->setTitle($faker->text(55));
            $post->setMetaTitle($faker->text(255));
            $post->setMetaDescription($faker->text(512));
            $post->setMetaKeywords($faker->text(255));
            $post ->setContent($faker->realText(2000));
            $post ->setExcerpt($faker->text(500));
            $post->setThumbnailImage(sprintf('blog-post-thumb-%s.jpg', (string)($i % 12 +1)));
            $post->setImage('blog-post-banner.jpg');
            $manager->persist($post);
        }
        $manager->flush();
    }
}