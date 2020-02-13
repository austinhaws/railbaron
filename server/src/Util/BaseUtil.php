<?php

namespace RailBaron\Util;

use RailBaron\Context\Context;

abstract class BaseUtil
{
    /** @var Context */
    protected $context;

    public function __construct(Context $context)
    {
        $this->context = $context;
    }
}
