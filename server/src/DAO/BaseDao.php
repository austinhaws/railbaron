<?php

namespace RailBaron\DAO;

use RailBaron\Context\Context;

class BaseDao
{
    /** @var Context */
    protected $context;
    /** @var String default path for dbToObj to construct objects from query results * */
    protected $defaultClassPath = null;

    public function __construct(Context $context)
    {
        $this->context = $context;
    }

    protected function testResult($result)
    {
        $result === 0 && die('Query FAILED');
        return $result;
    }

    protected function createQuestionMarks($count)
    {
        return trim(str_repeat('?, ', $count), ', ');
    }

    protected function executeCached($query, ...$params)
    {
        return $this->testResult($this->context->dbConnection->db->cacheGetAssoc($query, ...$params));
    }

    protected function getAll($query, ...$params)
    {
        return $this->testResult($this->context->dbConnection->db->getAll($query, ...$params));
    }

    protected function execute($query, ...$params)
    {
        return $this->testResult($this->context->dbConnection->db->execute($query, ...$params));
    }

    protected function dbToObj($dbArray, $classPath = null)
    {
        return $this->context->services->arrayService->mapArrayToObjects($classPath ?: $this->defaultClassPath, $dbArray);
    }
}
