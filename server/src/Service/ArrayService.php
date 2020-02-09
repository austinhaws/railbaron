<?php

namespace RailBaron\Service;

class ArrayService
{

	public function find(array $a, callable $f)
	{
		$result = null;
		foreach ($a as $o) {
			if (call_user_func($f, $o) === true) {
				$result = $o;
				break;
			}
		}
		return $result;
	}
}
