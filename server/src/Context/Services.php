<?php

namespace RailBaron\Context;

use RailBaron\Service\ArrayService;
use RailBaron\Service\CityService;

class Services
{
    /** @var ArrayService */
    public $arrayService;
    /** @var CityService */
    public $cityService;

    public function __construct(Context $context)
    {
        $this->arrayService = new ArrayService($context);
        $this->cityService = new CityService($context);
    }
}
