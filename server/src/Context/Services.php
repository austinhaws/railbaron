<?php

namespace RailBaron\Context;

use RailBaron\Service\ArrayService;

class Services
{
    /** @var ArrayService */
    public $arrayService;

    public function __construct(Context $context)
    {
        $this->arrayService = new ArrayService($context);
    }
}
