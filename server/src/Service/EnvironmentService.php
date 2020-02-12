<?php

namespace RailBaron\Service;

use Dotenv\Dotenv;
use RailBaron\Context\Context;
use RailBaron\Enum\Environment;

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
        return $this->isProduction ?: ($this->isProduction = (0 === strcmp(getenv(Environment::APP_ENV), 'production')));
    }

    public function dbHost()
    {
        return getenv(Environment::DB_HOST);
    }

    public function dbUsername()
    {
        return getenv(Environment::DB_USERNAME);
    }

    public function dbPassword()
    {
        return getenv(Environment::DB_PASSWORD);
    }

    public function dbDatabase()
    {
        return getenv(Environment::DB_DATABASE);
    }
}
