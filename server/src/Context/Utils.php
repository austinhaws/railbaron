<?php

namespace RailBaron\Context;

use RailBaron\Util\TypeUtil;

class Utils
{
    /** @var TypeUtil */
    public $typeUtil;

    public function __construct(Context $context)
    {
        $this->typeUtil = new TypeUtil($context);
    }
}
