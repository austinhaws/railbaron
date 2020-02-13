<?php

namespace RailBaron\DAO;

use RailBaron\Context\Context;

class PayoutDao extends BaseDao
{

    public function __construct(Context $context)
    {
        parent::__construct($context);
        $this->defaultClassPath = 'RailBaron\Model\Payout';
    }

    public function payoutForCityIds($city1Id, $city2Id)
    {
        return $this->dbAssocToObject($this->getAll('SELECT * FROM payout WHERE city1_id = ? AND city2_id = ?', [$city1Id, $city2Id]));
    }

    public function payoutsForCityId($cityId)
    {
        return $this->dbArrayToObjects($this->getAll('SELECT * FROM payout WHERE city1_id = ? OR city2_id = ?', [$cityId, $cityId]));
    }

    public function payoutsByIds($ids)
    {
        return $this->recordsByIds($ids, 'payout');
    }
}
