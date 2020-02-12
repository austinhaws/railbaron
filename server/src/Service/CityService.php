<?php

namespace RailBaron\Service;

use RailBaron\Enum\CitiesTable;
use RailBaron\Enum\RollType;

class CityService extends BaseService
{

    private $cityNameMap;

    private function loadCityNameMap()
    {
        if (!$this->cityNameMap) {
            $cities = $this->context->daos->cityDao->cities();
            $this->cityNameMap = array_reduce($cities, function ($carry, $city) {
                $carry[$city->name] = $city;
                return $carry;
            }, []);
        }
        return $this->cityNameMap;
    }


    public function randomCity($regionId)
    {
        if ($regionId) {
            $region = $this->context->daos->regionDao->regionForId($regionId);
        } else {
            $region = $this->context->services->regionService->randomRegion();
        }

        $cityName = $this->context->services->tableService->rollTable(CitiesTable::citiesForRegionName($region->name), RollType::ODD_EVEN);

        return ($this->loadCityNameMap())[$cityName];
    }
}
