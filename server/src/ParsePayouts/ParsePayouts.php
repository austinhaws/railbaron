<?php
namespace RailBaron\ParsePayouts;

use RailBaron\Context\Context;

class ParsePayouts {
    /** @var Context */
    private $context;

	public function run() {
        $this->context = Context::instance();

		$row = 1;
		ini_set('auto_detect_line_endings',TRUE);
		if (($handle = fopen("resources/Payoff Chart-Table 1.csv", "r")) !== FALSE) {
            $topCities = null;
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				if ($row++ === 1) {
					$topCities = $data;
				} else {
					$this->parsePayoutLine($topCities, $data);
				}
			}
			fclose($handle);
		}
	}

	private function cityObjectForCity($cityName) {
	    $cacheKey = 'city-' . $cityName;
	    if ($this->context->cache->has($cacheKey)) {
	        $result = $this->context->cache->get($cacheKey);
        } else {
            $cities = $this->context->daos->cityDao->selectCities();
            $result = $this->context->services->arrayService->find($cities, function ($o) use ($cityName) {
                return 0 === strcmp($o['name'], $cityName);
            });
            $this->context->cache->set($cacheKey, $result);
        }
	    return $result;
	}

	private function parsePayoutLine($topCities, $data) {
		$city1 = $data[0];
		$numFields = count($data);
		for ($x = 1; $x < $numFields; $x++) {
			$city2 = $topCities[$x];
            $city1DB = $this->cityObjectForCity($city1);
            $city2DB = $this->cityObjectForCity($city2);
            $payout = trim(preg_replace('/[,\-]/', '', $data[$x]));
            if ($payout && 0 !== strcmp($city1DB['name'], $city2DB['name'])) {
echo "adding {$city1DB['name']} => {$city2DB['name']} = $payout<p/>";
                $this->context->daos->payoutDao->insertPayout(
                    $city1DB['id'],
                    $city2DB['id'],
                    $payout
                );
            } else {
echo "!!! skipping {$city1DB['name']} => {$city2DB['name']} = $payout<p/>";
            }
		}
	}
}
