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
    /*public function findAccountActive()
    {
        return $this->createQueryBuilder()
            ->match()->field('status')  ->equals('ACTIVE')
            ->getQuery()
            ->execute();
    }*/

    public function getReport()
    {

    }

    public function getReports()
    {
        $dm = $this->getDocumentManager();
        $builder = $dm->createAggregationBuilder(Account::class);
        $builder ->match()
                    ->field('status')->equals('ACTIVE')

                 ->lookup('Metrics')
                    ->foreignField('accountId')
                    ->localField('accountId')->alias('metrics')

                 ->group()
                    ->field('id')
                        ->expression('$id')

                    ->field('accountName')
                        ->first('$accountName')
                    ->field('accountId')
                        ->first('$accountId')

                    ->field('spend')
                        ->sum( $builder->expr()->sum('$metrics.spend'))

                    ->field('clicks')
                        ->sum( $builder->expr()->sum('$metrics.clicks'))

                    ->field('impressions')
                        ->sum( $builder->expr() ->sum('$metrics.impressions'))

                    ->addFields()
                        ->field('costPerClick')
                            ->cond( $builder->expr()
                                            ->eq('$clicks', 0),0,
                                            ['$divide' => ['$spend', '$clicks' ] ] )

                 ->sort('id', 'asc');

        $resultado = $builder->getAggregation()->getIterator()->toArray();
        return $resultado;
    }
}
