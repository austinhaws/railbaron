<?php

namespace RailBaron\Context;

use RailBaron\Service\ArrayService;
use RailBaron\Service\CityService;
use RailBaron\Service\EnvironmentService;
use RailBaron\Service\GraphQLService;

class Services
{
    /** @var ArrayService */
    public $arrayService;
    /** @var CityService */
    public $cityService;
    /** @var EnvironmentService */
    public $environmentService;
    /** @var GraphQLService */
    public $graphQLService;

    public function __construct(Context $context)
    {
        $this->arrayService = new ArrayService($context);
        $this->cityService = new CityService($context);
        $this->environmentService = new EnvironmentService($context);
        $this->graphQLService = new GraphQLService($context);
    }
}
