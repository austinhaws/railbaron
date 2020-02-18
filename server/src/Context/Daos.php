<?php

namespace RailBaron\Context;

use RailBaron\DAO\CityDao;
use RailBaron\DAO\GameDao;
use RailBaron\DAO\PayoutDao;
use RailBaron\DAO\PlayerDao;
use RailBaron\DAO\RegionDao;
use RailBaron\DAO\WordDao;

class Daos
{
    /** @var CityDao */
    public $cityDao;
    /** @var GameDao */
    public $gameDao;
    /** @var PayoutDao */
    public $payoutDao;
    /** @var PlayerDao */
    public $playerDao;
    /** @var RegionDao */
    public $regionDao;
    /** @var WordDao */
    public $wordDao;

    public function __construct(Context $context)
    {
        $this->cityDao = new CityDao($context);
        $this->gameDao = new GameDao($context);
        $this->payoutDao = new PayoutDao($context);
        $this->playerDao = new PlayerDao($context);
        $this->regionDao = new RegionDao($context);
        $this->wordDao = new WordDao($context);
    }
}
