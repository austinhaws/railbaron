<?php

namespace RailBaron\GraphQL\Model;

use GraphQL\Utils\Utils;

class BaseModel
{
    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}
