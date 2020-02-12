<?php

namespace RailBaron\DAO;

use RailBaron\Context\Context;

class CityDao extends BaseDao
{

    public function __construct(Context $context)
    {
        parent::__construct($context);
        $this->defaultClassPath = 'RailBaron\Model\City';
    }

    public function cityForId($id)
    {
        return $this->dbAssocToObject($this->getAll('SELECT * FROM city WHERE id = ?', [$id]));
    }

    public function cities()
    {
        return $this->dbArrayToObjects($this->getAll('SELECT * FROM city'));
    }

    public function citiesForRegionId($regionId)
    {
        return $this->dbArrayToObjects($this->getAll('SELECT * FROM city WHERE region_id = ?', [$regionId]));
    }
}
