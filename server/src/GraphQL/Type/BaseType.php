<?php

namespace RailBaron\GraphQL\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use RailBaron\Context\Context;

class BaseType extends ObjectType
{
    /** @var Context */
    protected $context;

    public function __construct(Context $context, array $config)
    {
        $this->context = $context;

        if (!isset($config['resolveField'])) {
            $config['resolveField'] = function ($dbArray, $args, $context, ResolveInfo $info) {
                return $this->resolveField($dbArray, $args, $context, $info);
            };
        }

        parent::__construct($config);
    }

    protected function resolveField($dbArray, $args, $context, ResolveInfo $info)
    {
        $method = 'resolve' . ucfirst($info->fieldName);
        if (method_exists($this, $method)) {
            $result = $this->$method($dbArray, $args, $context, $info);
        } else if (is_object($dbArray)) {
            $result = $dbArray->{$info->fieldName};
        } else if (!isset($dbArray[$info->fieldName])) {
            var_dump([$dbArray, $args]);
            exit("There is no field '{$info->fieldName}' in the db array");
        } else {
            $result = $dbArray[$info->fieldName];
        }
        return $result;
    }
}
