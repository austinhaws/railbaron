<?php

namespace RailBaron\Context;

use RailBaron\Service\ArrayService;
use RailBaron\Service\CityService;
use RailBaron\Service\CurlService;
use RailBaron\Service\EnvironmentService;
use RailBaron\Service\GraphQLService;
use RailBaron\Service\RegionService;
use RailBaron\Service\TableService;
use RailBaron\Service\WordService;

class Services
{
    /** @var ArrayService */
    public $arrayService;
    /** @var CityService */
    public $cityService;
    /** @var CurlService */
    public $curlService;
    /** @var EnvironmentService */
    public $environmentService;
    /** @var GraphQLService */
    public $graphQLService;
    /** @var RegionService */
    public $regionService;
    /** @var TableService */
    public $tableService;
    /** @var WordService */
    public $wordService;

    public function __construct(Context $context)
    {
        $this->arrayService = new ArrayService($context);
        $this->cityService = new CityService($context);
        $this->curlService = new CurlService($context);
        $this->environmentService = new EnvironmentService($context);
        $this->graphQLService = new GraphQLService($context);
        $this->regionService = new RegionService($context);
        $this->tableService = new TableService($context);
        $this->wordService = new WordService($context);
    }
}
