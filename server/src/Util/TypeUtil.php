<?php

namespace RailBaron\Util;

use GraphQL\Type\Definition\ResolveInfo;

class TypeUtil extends BaseUtil
{
    public function addResolveFieldConfig($obj, array &$config)
    {
        if (!isset($config['resolveField'])) {
            $config['resolveField'] = function ($dbArray, $args, $context, ResolveInfo $info) use ($obj) {
                return $this->resolveField($obj, $dbArray, $args, $context, $info);
            };
        }
    }

    public function getArgFieldValue($args, $field)
    {
        return isset($args[$field]) ? $args[$field] : null;
    }

    private function resolveField($obj, $dbArray, $args, $context, ResolveInfo $info)
    {
        $method = 'resolve' . ucfirst($info->fieldName);
        if (method_exists($obj, $method)) {
            $result = $obj->$method($dbArray, $args, $context, $info);
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
