<?php

namespace RailBaron\Service;

use Dotenv\Dotenv;
use RailBaron\Context\Context;

class EnvironmentService extends BaseService
{
    private $isProduction;

    public function __construct(Context $context)
    {
        parent::__construct($context);

        Dotenv::createImmutable(__DIR__ . '/../../')->load();
    }

    public function isProduction()
    {
        return $this->isProduction ?: ($this->isProduction = (0 === strcmp(getenv('APP_ENV'), 'production')));
    }

    public function dbHost()
    {
        return getenv('DB_HOST');
    }

    public function dbUsername()
    {
        return getenv('DB_USERNAME');
    }

    public function dbPassword()
    {
        return getenv('DB_PASSWORD');
    }

    public function dbDatabase()
    {
        return getenv('DB_DATABASE');
    }
}
