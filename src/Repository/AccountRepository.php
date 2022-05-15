<?php

namespace App\Repository;

use App\Document\Account;
use Doctrine\ODM\MongoDB\DocumentManager;
#use Doctrine\ODM\MongoDB\DocumentRepository;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;
use Symfony\Component\HttpFoundation\Response;


class AccountRepository extends DocumentRepository
{
    public function findAllAccountById()
    {
        return $this->createQueryBuilder()
            ->sort('id', 'ASC')
            ->getQuery()
            ->execute();
    }
}
