<?php

namespace RailBaron\Service;

use ReflectionClass;

class ArrayService extends BaseService
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

    public function mapArrayToObjects($instanceName, $dbArray)
    {
        if (!$instanceName) {
            var_dump(['instanceName' => $instanceName, 'dbArray' => $dbArray]);
            exit('Instance class path name is not set so there is no way to create objects from the db results');
        }

        try {
            $reflection = new ReflectionClass($instanceName);
        } catch (\ReflectionException $e) {
            throw new \RuntimeException($e);
        }

        return array_map(function ($dbObj) use ($reflection) {
            return $reflection->newInstanceArgs([$this->convertKeysToCamelCase($dbObj)]);
        }, $dbArray ?: []);
    }

    // https://stackoverflow.com/a/31276874/1478933
    private function convertKeysToCamelCase($array)
    {
        $result = [];

        array_walk_recursive($array, function ($value, &$key) use (&$result) {
            $newKey = preg_replace_callback('/_([a-z])/', function ($matches) {
                return strtoupper($matches[1]);
            }, $key);

            $result[$newKey] = $value;
        });

        return $result;
    }
}
