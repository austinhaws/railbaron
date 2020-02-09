<?php
namespace RailBaron\DAO;

use ADOConnection;
use RailBaron\Config\DBConfig;

class DBConnection {
    /** @var ADOConnection */
	public $db;

	public function __construct()
	{
		$this->db = ADONewConnection('mysqli');
		$options = new DBConfig();
		$this->db->connect($options->host, $options->username, $options->password, $options->schema) || die('Unable to connect to DB');
	}
}
