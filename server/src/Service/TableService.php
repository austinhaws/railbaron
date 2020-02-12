<?php

namespace RailBaron\Service;

use RailBaron\Enum\RollType;

class TableService extends BaseService
{
    public function rollTable($table, $rollType)
    {
        switch ($rollType) {
            case RollType::CITY_IN_REGION:
                $roll = rand(1, 6) + rand(1, 6);
                $result = $table[$roll];
                break;

            case RollType::ODD_EVEN:
                $roll = rand(1, 2);
                $result = $this->rollTable($table[$roll], RollType::CITY_IN_REGION);
                break;

            default:
                throw new \RuntimeException("TableService.rollTable() Involved roll type: $rollType");
        }

        return $result;
    }
}
