<?php
namespace RailBaron\Context;

use RailBaron\DAO\DBConnection;

class Context {
    /** @var Daos  */
    public $daos;
    /** @var Services  */
    public $services;
    /** @var DBConnection  */
    public $dbConnection;

    public function __construct()
    {
        $this->dbConnection = new DBConnection();

        $this->daos = new Daos($this);

        $this->services = new Services($this);
    }
}
