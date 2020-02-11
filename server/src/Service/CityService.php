<?php

namespace RailBaron\Service;

class CityService extends BaseService
{

	public function getCitiesForRegion(int $regionId)
	{
	    return $this->context->daos->cityDao->selectCitiesByRegionId($regionId);
	}
}
