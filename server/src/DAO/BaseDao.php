<?php
namespace RailBaron\DAO;

use RailBaron\Context\Context;

class BaseDao {
	/** @var Context  */
	protected $context;

	public function __construct(Context $context)
	{
		$this->context = $context;
	}

	protected function testResult($location, $result) {
		$result === 0 && die($location . ' FAILED');
		return $result;
	}

	protected function createQuestionMarks($count) {
		return trim(str_repeat('?, ', $count), ', ');
	}

	protected function execute($location, $query, ...$params) {
		return $this->testResult($location, $this->context->dbConnection->db->execute($query, $params));
	}
}
