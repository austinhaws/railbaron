<?php

namespace RailBaron\GraphQL\Model;

class City extends BaseModel
{
    /** @var int */
    public $id;
    /** @var int */
    public $regionId;
    /** @var string */
    public $name;
}
