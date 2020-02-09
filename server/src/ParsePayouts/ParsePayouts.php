<?php
namespace RailBaron\ParsePayouts;

use RailBaron\Context\Context;
use RailBaron\Service\ArrayService;

class ParsePayouts {
    /** @var Context */
    private $context;

	public function run() {
        $this->context = new Context();

		$row = 1;
		ini_set('auto_detect_line_endings',TRUE);
		if (($handle = fopen("resources/Payoff Chart-Table 1.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				if ($row++ === 1) {
					$cities = json_encode($data);
echo "cities = {$cities}<p/>";
					$topCities = $data;
				} else {
					$this->parsePayoutLine($topCities, $data);
				}
			}
			fclose($handle);
		}
	}

	private function cityObjectForCity($cityName) {
		$cities = $this->context->daos->cityDao->selectCities();
		$arrayService = new ArrayService();
		return $arrayService->find($cities, function ($o) use ($cityName) {
			return $o['name'] === $cityName;
		});
	}

	private function parsePayoutLine($topCities, $data) {
		$city1 = $data[0];
		$numFields = count($data);
		for ($x = 1; $x < $numFields; $x++) {
			$city2 = $topCities[$x];
			echo "$city1 => $city2 : $data[$x]<p/>";
			var_dump([$this->cityObjectForCity($city1), $this->cityObjectForCity($city2)]);
		}
	}
}
