<?php
namespace RailBaron\DAO;

class PayoutDao extends BaseDao
{

    public function insertPayout($city1_id, $city2_id, $payout)
    {
        $this->context->dbConnection->db->execute("
            INSERT INTO payout (city1_id, city2_id, payout) VALUES
                ({$this->createQuestionMarks(3)})
        ", [$city1_id, $city2_id, $payout]);
    }
}
