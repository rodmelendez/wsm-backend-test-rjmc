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
    public function findAccountActive()
    {
        return $this->createQueryBuilder()
            ->match()->field('status')  ->equals('ACTIVE')
            ->getQuery()
            ->execute();
    }

    public function getReports( string | null $accountId = null)
    {
        $dm = $this->getDocumentManager();
        $builder = $dm->createAggregationBuilder(Account::class);
        $builder->match()->field('status')  ->equals('ACTIVE')
            ->lookup('Metrics')             ->foreignField('accountId')
            ->localField('accountId')    ->alias('metrics')
            ->group()                            ->field('id')
            ->expression('$accountId')      ->field('spend')
            ->sum( $builder->expr()->sum('$metrics.spend'))
            ->field('impressions') ->sum( $builder->expr() ->sum('$metrics.impressions'))
            ->field('clicks')->sum( $builder->expr()->sum('$metrics.clicks'));

        $result = $builder->getAggregation()->getIterator()->toArray();

        return $result;
    }
}
