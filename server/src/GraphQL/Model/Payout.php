<?php

namespace RailBaron\GraphQL\Model;

class Payout extends BaseModel
{
    /** @var int */
    public $id;
    /** @var int */
    public $city1Id;
    /** @var int */
    public $city2Id;
    /** @var int */
    public $payout;
}
