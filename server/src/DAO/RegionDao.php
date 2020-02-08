<?php
namespace RailBaron\DAO;

use RailBaron\Service\ArrayService;

class RegionDao {

	const ID = 'id';
	const NAME = 'name';
	const NORTH_CENTRAL = 'North Central';
	const NORTH_EAST = 'North East';
	const NORTHWEST = 'Northwest';
	const PLAINS = 'Plains';
	const SOUTH_CENTRAL = 'South Central';
	const SOUTHEAST = 'Southeast';
	const SOUTHWEST = 'Southwest';

	public function regions() {
		return [
			[RegionDao::ID => 1, RegionDao::NAME => RegionDao::NORTH_CENTRAL],
			[RegionDao::ID => 2, RegionDao::NAME => RegionDao::NORTH_EAST],
			[RegionDao::ID => 3, RegionDao::NAME => RegionDao::NORTHWEST],
			[RegionDao::ID => 4, RegionDao::NAME => RegionDao::PLAINS],
			[RegionDao::ID => 5, RegionDao::NAME => RegionDao::SOUTH_CENTRAL],
			[RegionDao::ID => 6, RegionDao::NAME => RegionDao::SOUTHEAST],
			[RegionDao::ID => 7, RegionDao::NAME => RegionDao::SOUTHWEST],
		];
	}

	public function regionForName($regionName) {
		return (new ArrayService())->find($this->regions(), function ($region) use($regionName) {
			return strcmp($region[RegionDao::NAME], $regionName) === 0;
		});
	}
}
