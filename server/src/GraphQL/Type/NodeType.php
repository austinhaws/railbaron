<?php
namespace RailBaron\GraphQL\Type;

use GraphQL\Type\Definition\InterfaceType;
use GraphQL\Type\Definition\Type;
use RailBaron\Context\Context;
use RailBaron\GraphQL\Data\Region;

class NodeType extends InterfaceType
{
    public function __construct()
    {
        $config = [
            'name' => 'Node',
            'fields' => [
                'id' => Type::id()
            ],
            'resolveType' => [$this, 'resolveNodeType']
        ];
        parent::__construct($config);
    }

    public function resolveNodeType($object)
    {
        if ($object instanceof Region) {
            return Context::instance()->typeRegistry->regionType();
        // } else if ($object instanceof City) {
        //     return Context::instance()->typeRegistry->cityType();
        } else {
            var_dump($object);
            throw new \RuntimeException("NodeType::resolveNodeType: Unknown object type");
        }
    }
}
