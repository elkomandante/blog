<?php


namespace App\Service\Paginator;


use Doctrine\ORM\QueryBuilder;
use Knp\Component\Pager\PaginatorInterface;

class Paginator
{

    private $paginator;

    public function __construct(PaginatorInterface $paginator)
    {
        $this->paginator = $paginator;
    }

    public function paginateQuery(QueryBuilder $queryBuilder, $page = 1, $limit = 10)
    {
        return $this->paginator->paginate($queryBuilder, $page, $limit);
    }

}