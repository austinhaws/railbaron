<?php

namespace RailBaron\GraphQL;

use RailBaron\Context\Context;
use RailBaron\GraphQL\Type\CityType;
use RailBaron\GraphQL\Type\PayoutType;
use RailBaron\GraphQL\Type\QueryType;
use RailBaron\GraphQL\Type\RegionType;

class TypeRegistry
{
    /** @var Context */
    private $context;

    /** @var CityType */
    private $cityType;
    /** @var PayoutType */
    private $payoutType;
    /** @var QueryType */
    private $queryType;
    /** @var RegionType */
    private $regionType;

    public function __construct(Context $context)
    {
        $this->context = $context;
    }

    public function cityType()
    {
        return $this->cityType ?: ($this->cityType = new CityType($this->context));
    }

    public function payoutType()
    {
        return $this->payoutType ?: ($this->payoutType = new PayoutType($this->context));
    }

    public function queryType()
    {
        return $this->queryType ?: ($this->queryType = new QueryType($this->context));
    }

    public function regionType()
    {
        return $this->regionType ?: ($this->regionType = new RegionType($this->context));
    }

}
