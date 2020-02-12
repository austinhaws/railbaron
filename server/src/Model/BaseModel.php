<?php

namespace RailBaron\Model;

use GraphQL\Utils\Utils;

class BaseModel
{
    public function __construct($data)
    {
        if ($data) {
            Utils::assign($this, $data);
        }
    }
}
