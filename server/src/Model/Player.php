<?php

namespace RailBaron\Model;

class Player extends BaseModel
{
    /** @var int */
    public $id;
    /** @var int */
    public $gameId;
    /** @var int */
    public $toCityId;
    /** @var int */
    public $fromCityId;
    /** @var int */
    public $homeCityId;
    /** @var string */
    public $tawColor;
    /** @var string */
    public $name;
}
