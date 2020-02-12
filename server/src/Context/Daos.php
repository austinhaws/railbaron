<?php

namespace RailBaron\Context;

use RailBaron\DAO\CityDao;
use RailBaron\DAO\GameDao;
use RailBaron\DAO\PayoutDao;
use RailBaron\DAO\PlayerDao;
use RailBaron\DAO\RegionDao;

class Daos
{
    /** @var CityDao */
    public $cityDao;
    /** @var GameDao */
    public $gameDao;
    /** @var PayoutDao */
    public $payoutDao;
    /** @var RegionDao */
    public $regionDao;

    public function __construct(Context $context)
    {
        $this->cityDao = new CityDao($context);
        $this->gameDao = new GameDao($context);
        $this->payoutDao = new PayoutDao($context);
        $this->playerDao = new PlayerDao($context);
        $this->regionDao = new RegionDao($context);
    }
}
