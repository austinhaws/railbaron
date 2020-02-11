<?php

namespace RailBaron\DAO;

use RailBaron\Context\Context;

class RegionDao extends BaseDao
{

    public function __construct(Context $context)
    {
        parent::__construct($context);
        $this->defaultClassPath = 'RailBaron\GraphQL\Model\Region';
    }

    public function regions()
    {
        return $this->dbToObj($this->getAll('SELECT * FROM region'));
    }

    public function regionForId($id)
    {
        return $this->dbToObj($this->getAll('SELECT * FROM region WHERE id = ?', [$id]));
    }
}
