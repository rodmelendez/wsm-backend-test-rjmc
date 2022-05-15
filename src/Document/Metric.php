<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

use App\Repository\MetricRepository;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;

/**
 * @MongoDB\Document(db="demo-db", collection="Metrics", repositoryClass=MetricRepository::class)
 */

class Metric
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $date;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $accountId;

    /**
     * @MongoDB\Field(type="int")
     */
    protected $impressions;

    /**
     * @MongoDB\Field(type="int")
     */
    protected $clicks;

    /**
     * @MongoDB\Field(type="float")
     */
    protected $ctr;

    /**
     * @MongoDB\Field(type="int")
     */
    protected $conversions;

    /**
     * @MongoDB\Field(type="float")
     */
    protected $costPerClick;

    /**
     * @MongoDB\Field(type="float")
     */
    protected $spend;

    /*** Getters and Setters ***/

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param mixed $accountId
     */
    public function setAccountId($accountId): void
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getImpressions()
    {
        return $this->impressions;
    }

    /**
     * @param mixed $impressions
     */
    public function setImpressions($impressions): void
    {
        $this->impressions = $impressions;
    }

    /**
     * @return mixed
     */
    public function getClicks()
    {
        return $this->clicks;
    }

    /**
     * @param mixed $clicks
     */
    public function setClicks($clicks): void
    {
        $this->clicks = $clicks;
    }

    /**
     * @return mixed
     */
    public function getCtr()
    {
        return $this->ctr;
    }

    /**
     * @param mixed $ctr
     */
    public function setCtr($ctr): void
    {
        $this->ctr = $ctr;
    }

    /**
     * @return mixed
     */
    public function getConversions()
    {
        return $this->conversions;
    }

    /**
     * @param mixed $conversions
     */
    public function setConversions($conversions): void
    {
        $this->conversions = $conversions;
    }

    /**
     * @return mixed
     */
    public function getCostPerClick()
    {
        return $this->costPerClick;
    }

    /**
     * @param mixed $costPerClick
     */
    public function setCostPerClick($costPerClick): void
    {
        $this->costPerClick = $costPerClick;
    }

    /**
     * @return mixed
     */
    public function getSpend()
    {
        return $this->spend;
    }

    /**
     * @param mixed $spend
     */
    public function setSpend($spend): void
    {
        $this->spend = $spend;
    }


}