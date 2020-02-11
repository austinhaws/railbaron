<?php
namespace RailBaron\DAO;

class RegionDao extends BaseDao {

    public function regions()
    {
        return $this->getAll('RegionDao->executeCached()', 'SELECT * FROM region');
    }

    public function regionForId($id)
    {
        return $this->getAll('RegionDao->executeCached()', 'SELECT * FROM region WHERE id = ?', [$id]);
    }
}
