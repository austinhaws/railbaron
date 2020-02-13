<?php

namespace RailBaron\Context;

use Phpfastcache\Helper\Psr16Adapter;
use RailBaron\DAO\DBConnection;
use RailBaron\GraphQL\TypeRegistry;

class Context
{
    /** @var Buffers */
    public $buffers;
    /** @var Psr16Adapter */
    public $cache;
    /** @var Daos */
    public $daos;
    /** @var DBConnection */
    public $dbConnection;
    /** @var Services */
    public $services;
    /** @var TypeRegistry */
    public $typeRegistry;
    /** @var Utils */
    public $utils;

    /** @var Context */
    private static $instance;

    private function __construct()
    {
        $this->cache = new Psr16Adapter('Memstatic');

        $this->buffers = new Buffers($this);

        $this->utils = new Utils($this);

        $this->daos = new Daos($this);

        $this->services = new Services($this);

        $this->typeRegistry = new TypeRegistry($this);

        $this->dbConnection = new DBConnection($this);
    }

    public static function instance()
    {
        if (!self::$instance) {
            self::$instance = new Context();
        }
        return self::$instance;
    }
}
