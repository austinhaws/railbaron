<?php

namespace RailBaron\Service;

use RailBaron\Enum\RegionTable;
use RailBaron\Enum\RollType;

class RegionService extends BaseService
{
    private $regionNameMap;

    private function loadRegionNameMap()
    {
        if (!$this->regionNameMap) {
            $regions = $this->context->daos->regionDao->regions();
            $this->regionNameMap = array_reduce($regions, function ($carry, $region) {
                $carry[$region->name] = $region;
                return $carry;
            }, []);
        }
        return $this->regionNameMap;
    }

    public function randomRegion()
    {
        $regionName = $this->context->services->tableService->rollTable(RegionTable::TABLE, RollType::ODD_EVEN);

        return ($this->loadRegionNameMap())[$regionName];
    }
}
