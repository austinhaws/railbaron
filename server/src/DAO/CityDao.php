<?php
namespace RailBaron\DAO;

class CityDao extends BaseDao
{

	public function selectCities()
	{
	    return $this->execute(
			"CityDAO::selectCities",
			'SELECT * FROM city'
		)->GetArray();
	}

	public function selectCitiesByRegionId($region_id)
	{
		return $this->testResult(
			"CityDAO::selectCities failed",
			$this->dbConnection->execute('SELECT * FROM city WHERE region_id = ?', $region_id)
		);
	}

	public function selectCitiesByRegionIds($region_ids)
	{
		return $this->testResult(
			"CityDAO::selectCities failed",
			$this->dbConnection->execute("
				SELECT *
				FROM city
				WHERE region_id IN ({$this->createQuestionMarks(count($region_ids))})
			", $region_ids)
		);
	}
}
