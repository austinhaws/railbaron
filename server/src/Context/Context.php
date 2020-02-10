<?php
namespace RailBaron\Context;

use Phpfastcache\Helper\Psr16Adapter;
use RailBaron\DAO\DBConnection;

class Context {
    /** @var Daos  */
    public $daos;
    /** @var Services  */
    public $services;
    /** @var DBConnection  */
    public $dbConnection;
    /** @var Psr16Adapter */
    public $cache;

    public function __construct()
    {
        $this->dbConnection = new DBConnection();

        $this->cache = new Psr16Adapter('Memstatic');

        $this->daos = new Daos($this);

        $this->services = new Services($this);
    }
}
