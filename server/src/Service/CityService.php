<?php

namespace RailBaron\Service;

class CityService extends BaseService
{

    public function getCitiesForRegion($regionId)
    {
        return $this->context->daos->cityDao->selectCitiesByRegionId($regionId);
    }
}
