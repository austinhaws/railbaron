<?php
namespace RailBaron\DAO;

class CityDao {
	const ID = 'id';
	const NAME = 'name';
	const REGION_ID = 'region_id';

	public function cities() {
		$regionDao = new RegionDao();
		return [
			[CityDao::ID => 1, CityDao::NAME => 'Albany', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTH_EAST)[RegionDao::ID]],
			[CityDao::ID => 3, CityDao::NAME => 'Baltimore', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTH_EAST)[RegionDao::ID]],
			[CityDao::ID => 6, CityDao::NAME => 'Boston', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTH_EAST)[RegionDao::ID]],
			[CityDao::ID => 7, CityDao::NAME => 'Buffalo', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTH_EAST)[RegionDao::ID]],
			[CityDao::ID => 40, CityDao::NAME => 'New York', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTH_EAST)[RegionDao::ID]],
			[CityDao::ID => 45, CityDao::NAME => 'Philadelphia', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTH_EAST)[RegionDao::ID]],
			[CityDao::ID => 47, CityDao::NAME => 'Pittsburgh', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTH_EAST)[RegionDao::ID]],
			[CityDao::ID => 49, CityDao::NAME => 'Portland, Ma', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTH_EAST)[RegionDao::ID]],
			[CityDao::ID => 67, CityDao::NAME => 'Washington', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTH_EAST)[RegionDao::ID]],

			[CityDao::ID => 2, CityDao::NAME => 'Atlanta', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTHEAST)[RegionDao::ID]],
			[CityDao::ID => 10, CityDao::NAME => 'Charleston', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTHEAST)[RegionDao::ID]],
			[CityDao::ID => 11, CityDao::NAME => 'Charlotte', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTHEAST)[RegionDao::ID]],
			[CityDao::ID => 12, CityDao::NAME => 'Chattanooga', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTHEAST)[RegionDao::ID]],
			[CityDao::ID => 26, CityDao::NAME => 'Jacksonville', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTHEAST)[RegionDao::ID]],
			[CityDao::ID => 34, CityDao::NAME => 'Miami', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTHEAST)[RegionDao::ID]],
			[CityDao::ID => 28, CityDao::NAME => 'Knoxville', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTHEAST)[RegionDao::ID]],
			[CityDao::ID => 37, CityDao::NAME => 'Mobile', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTHEAST)[RegionDao::ID]],
			[CityDao::ID => 41, CityDao::NAME => 'Norfolk', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTHEAST)[RegionDao::ID]],
			[CityDao::ID => 54, CityDao::NAME => 'Richmond', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTHEAST)[RegionDao::ID]],
			[CityDao::ID => 65, CityDao::NAME => 'Tampa', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTHEAST)[RegionDao::ID]],

			[CityDao::ID => 4, CityDao::NAME => 'Billings', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTHWEST)[RegionDao::ID]],
			[CityDao::ID => 50, CityDao::NAME => 'Portland, Ore', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTHWEST)[RegionDao::ID]],
			[CityDao::ID => 48, CityDao::NAME => 'Pocatello', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTHWEST)[RegionDao::ID]],
			[CityDao::ID => 52, CityDao::NAME => 'Rapid City', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTHWEST)[RegionDao::ID]],
			[CityDao::ID => 56, CityDao::NAME => 'Salt Lake City', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTHWEST)[RegionDao::ID]],
			[CityDao::ID => 60, CityDao::NAME => 'Seattle', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTHWEST)[RegionDao::ID]],
			[CityDao::ID => 62, CityDao::NAME => 'Spokane', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTHWEST)[RegionDao::ID]],
			[CityDao::ID => 8, CityDao::NAME => 'Butte', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTHWEST)[RegionDao::ID]],
			[CityDao::ID => 9, CityDao::NAME => 'Casper', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTHWEST)[RegionDao::ID]],

			[CityDao::ID => 5, CityDao::NAME => 'Birmingham', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTH_CENTRAL)[RegionDao::ID]],
			[CityDao::ID => 17, CityDao::NAME => 'Dallas', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTH_CENTRAL)[RegionDao::ID]],
			[CityDao::ID => 23, CityDao::NAME => 'Fort Worth', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTH_CENTRAL)[RegionDao::ID]],
			[CityDao::ID => 24, CityDao::NAME => 'Houston', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTH_CENTRAL)[RegionDao::ID]],
			[CityDao::ID => 30, CityDao::NAME => 'Little Rock', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTH_CENTRAL)[RegionDao::ID]],
			[CityDao::ID => 32, CityDao::NAME => 'Louisville', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTH_CENTRAL)[RegionDao::ID]],
			[CityDao::ID => 33, CityDao::NAME => 'Memphis', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTH_CENTRAL)[RegionDao::ID]],
			[CityDao::ID => 38, CityDao::NAME => 'Nashville', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTH_CENTRAL)[RegionDao::ID]],
			[CityDao::ID => 39, CityDao::NAME => 'New Orleans', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTH_CENTRAL)[RegionDao::ID]],
			[CityDao::ID => 57, CityDao::NAME => 'San Antonio', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTH_CENTRAL)[RegionDao::ID]],
			[CityDao::ID => 61, CityDao::NAME => 'Shreveport', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTH_CENTRAL)[RegionDao::ID]],

			[CityDao::ID => 13, CityDao::NAME => 'Chicago', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTH_CENTRAL)[RegionDao::ID]],
			[CityDao::ID => 14, CityDao::NAME => 'Cincinnati', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTH_CENTRAL)[RegionDao::ID]],
			[CityDao::ID => 15, CityDao::NAME => 'Cleveland', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTH_CENTRAL)[RegionDao::ID]],
			[CityDao::ID => 16, CityDao::NAME => 'Columbus', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTH_CENTRAL)[RegionDao::ID]],
			[CityDao::ID => 20, CityDao::NAME => 'Detroit', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTH_CENTRAL)[RegionDao::ID]],
			[CityDao::ID => 25, CityDao::NAME => 'Indianapolis', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTH_CENTRAL)[RegionDao::ID]],
			[CityDao::ID => 35, CityDao::NAME => 'Milwaukee', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTH_CENTRAL)[RegionDao::ID]],
			[CityDao::ID => 63, CityDao::NAME => 'St. Louis', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::NORTH_CENTRAL)[RegionDao::ID]],

			[CityDao::ID => 18, CityDao::NAME => 'Denver', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::PLAINS)[RegionDao::ID]],
			[CityDao::ID => 19, CityDao::NAME => 'Des Moines', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::PLAINS)[RegionDao::ID]],
			[CityDao::ID => 22, CityDao::NAME => 'Fargo', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::PLAINS)[RegionDao::ID]],
			[CityDao::ID => 27, CityDao::NAME => 'Kansas City', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::PLAINS)[RegionDao::ID]],
			[CityDao::ID => 36, CityDao::NAME => 'Minneapolis', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::PLAINS)[RegionDao::ID]],
			[CityDao::ID => 43, CityDao::NAME => 'Oklahoma City', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::PLAINS)[RegionDao::ID]],
			[CityDao::ID => 44, CityDao::NAME => 'Omaha', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::PLAINS)[RegionDao::ID]],
			[CityDao::ID => 51, CityDao::NAME => 'Pueblo', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::PLAINS)[RegionDao::ID]],
			[CityDao::ID => 64, CityDao::NAME => 'St. Paul', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::PLAINS)[RegionDao::ID]],

			[CityDao::ID => 29, CityDao::NAME => 'Las Vegas', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTHWEST)[RegionDao::ID]],
			[CityDao::ID => 21, CityDao::NAME => 'El Paso', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTHWEST)[RegionDao::ID]],
			[CityDao::ID => 31, CityDao::NAME => 'Los Angeles', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTHWEST)[RegionDao::ID]],
			[CityDao::ID => 42, CityDao::NAME => 'Oakland', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTHWEST)[RegionDao::ID]],
			[CityDao::ID => 46, CityDao::NAME => 'Phoenix', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTHWEST)[RegionDao::ID]],
			[CityDao::ID => 53, CityDao::NAME => 'Reno', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTHWEST)[RegionDao::ID]],
			[CityDao::ID => 55, CityDao::NAME => 'Sacramento', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTHWEST)[RegionDao::ID]],
			[CityDao::ID => 58, CityDao::NAME => 'San Diego', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTHWEST)[RegionDao::ID]],
			[CityDao::ID => 59, CityDao::NAME => 'San Francisco', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTHWEST)[RegionDao::ID]],
			[CityDao::ID => 66, CityDao::NAME => 'Tucumcari', CityDao::REGION_ID => $regionDao->regionForName(RegionDao::SOUTHWEST)[RegionDao::ID]],
		];
	}
}
