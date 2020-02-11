<?php

namespace RailBaron\GraphQL\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use RailBaron\Context\Context;
use ReflectionClass;

class BaseType extends ObjectType
{
    /** @var Context */
    protected $context;

    public function __construct(Context $context, array $config)
    {
        $this->context = $context;

        if (!isset($config['resolveField'])) {
            $config['resolveField'] = function ($dbArray, $args, $context, ResolveInfo $info) {
                $this->resolveField($dbArray, $args, $context, $info);
            };
        }

        parent::__construct($config);
    }

    protected function resolveField($dbArray, $args, $context, ResolveInfo $info)
    {
        $method = 'resolve' . ucfirst($info->fieldName);
        if (method_exists($this, $method)) {
            $result = $this->$method($dbArray, $args, $context, $info);
        } else {
            if (is_object($dbArray)) {
                $result = $dbArray->{$info->fieldName};
            }  else {
                if (!isset($dbArray[$info->fieldName])) {
                    var_dump([$dbArray, $args]);
                    exit("There is no field '{$info->fieldName}' in this db array");
                }
                $result = $dbArray[$info->fieldName];
            }
        }
        return $result;
    }

    protected function mapArrayToObjects($instanceName, $dbArray)
    {
        try {
            $reflection = new ReflectionClass($instanceName);
        } catch (\ReflectionException $e) {
            var_dump($e);
            exit();
        }
        return array_map(function ($dbObj) use ($reflection) {
            return $reflection->newInstanceArgs([$dbObj]);
        }, $dbArray ?: []);
    }
}
