<?php

namespace RailBaron\DAO;

use RailBaron\Context\Context;

class RegionDao extends BaseDao
{

    public function __construct(Context $context)
    {
        parent::__construct($context);
        $this->defaultClassPath = 'RailBaron\Model\Region';
    }

    public function regions()
    {
        return $this->dbArrayToObjects($this->getAll('SELECT * FROM region'));
    }

    public function regionForId($id)
    {
        return $this->dbAssocToObject($this->getAll('SELECT * FROM region WHERE id = ?', [$id])[0]);
    }

    public function regionsByIds($ids)
    {
        return $this->recordsByIds($ids, 'region');
    }
}
