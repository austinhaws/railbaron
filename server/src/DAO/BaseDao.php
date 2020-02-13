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

    protected function dbArrayToObjects($dbArray, $classPath = null)
    {
        return $this->context->services->arrayService->mapArrayToObjects($classPath ?: $this->defaultClassPath, $dbArray);
    }

    protected function dbAssocToObject($dbAssoc, $classPath = null)
    {
        return count($dbAssoc) ? $this->context->services->arrayService->mapArrayToObjects($classPath ?: $this->defaultClassPath, [$dbAssoc])[0] : null;
    }

    protected function insert($query, ...$params)
    {
        $this->context->dbConnection->db->execute($query, ...$params);
        return $this->context->dbConnection->db->insert_id();
    }

    public function recordsByIds($ids, $tableName)
    {
        return $this->dbArrayToObjects($this->getAll("SELECT * FROM $tableName WHERE id IN ({$this->createQuestionMarks(count($ids))})", $ids));
    }
}
