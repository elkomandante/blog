<?php


namespace App\Repository;


use Doctrine\ORM\QueryBuilder;

interface PostRepositoryInterface
{
    public function save($post);
    public function getPageOfPostsQueryBuilder(): QueryBuilder;
}