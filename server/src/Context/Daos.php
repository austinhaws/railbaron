<?php

namespace RailBaron\Context;

use RailBaron\DAO\CityDao;
use RailBaron\DAO\RegionDao;

class Daos
{
    /** @var CityDao */
    public $cityDao;
    /** @var RegionDao */
    public $regionDao;

    public function __construct(Context $context)
    {
        $this->cityDao = new CityDao($context);
        $this->regionDao = new RegionDao($context);
    }
}
