<?php

namespace RailBaron\Service;

use RailBaron\Context\Context;

class BaseService
{
    /** @var Context  */
    public $context;
    public function __construct(Context $context)
    {
        $this->context = $context;
    }
}
