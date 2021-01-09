<?php


namespace App\DataFixtures;


use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UserFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 1; $i < 500; $i++){
            $post = new Post();
            $post->setTitle($faker->text(55));
            $post ->setContent($faker->realText(2000));
            $post ->setExcerpt($faker->text(500));
            $post->setThumbnailImage(sprintf('blog-post-thumb-%s.jpg', (string)($i % 12 +1)));
            $post->setImage(sprintf('blog-post-thumb-%s.jpg', (string)($i % 12 +1)));
            $post->setTimePublished(new \DateTime());
            $manager->persist($post);
        }
        $manager->flush();
    }
}