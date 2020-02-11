<?php

namespace RailBaron\Context;

use RailBaron\DAO\CityDao;
use RailBaron\DAO\PayoutDao;
use RailBaron\DAO\RegionDao;

class Daos
{
    /** @var CityDao */
    public $cityDao;
    /** @var PayoutDao */
    public $payoutDao;
    /** @var RegionDao */
    public $regionDao;

    public function __construct(Context $context)
    {
        $this->cityDao = new CityDao($context);
        $this->payoutDao = new PayoutDao($context);
        $this->regionDao = new RegionDao($context);
    }
}
