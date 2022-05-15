<?php

namespace App\Repository;

use App\Document\Metric;
use Doctrine\ODM\MongoDB\DocumentManager;
#use Doctrine\ODM\MongoDB\DocumentRepository;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;
use Symfony\Component\HttpFoundation\Response;

class MetricRepository extends DocumentRepository
{
    public function findAllMetricById()
    {
        return $this->createQueryBuilder()
            ->sort('id', 'ASC')
            ->getQuery()
            ->execute();
    }
}