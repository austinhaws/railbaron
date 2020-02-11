<?php

namespace RailBaron\DAO;

use ADOConnection;
use RailBaron\Context\Context;

class DBConnection
{
    /** @var ADOConnection */
    public $db;
    /** @var Context */
    private $context;

    public function __construct(Context $context)
    {
        $this->context = $context;
        $this->db = ADONewConnection('mysqli');
        $this->db->connect(
            $context->services->environmentService->dbHost(),
            $context->services->environmentService->dbUsername(),
            $context->services->environmentService->dbPassword(),
            $context->services->environmentService->dbDatabase()
        ) || die('Unable to connect to DB');
        $this->db->SetFetchMode(ADODB_FETCH_ASSOC);
    }
}
