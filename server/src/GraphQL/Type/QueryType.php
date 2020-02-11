<?php

namespace RailBaron\GraphQL\Type;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use RailBaron\Context\Context;

class QueryType extends BaseType
{
    public function __construct(Context $context)
    {
        parent::__construct($context, [
            'name' => 'Query',
            'fields' => [
                'regions' => [
                    'type' => Type::listOf($context->typeRegistry->regionType()),
                    'description' => 'Returns region optionally by id',
                    'args' => [
                        'id' => Type::id(),
                    ]
                ],
                'cities' => [
                    'type' => Type::listOf($context->typeRegistry->cityType()),
                    'description' => 'Returns regions optionally by id',
                    'args' => [
                        'id' => Type::id(),
                    ]
                ]
            ],
        ]);
    }

    public function resolveRegions($rootValue, $args, $context, ResolveInfo $info)
    {
        $regionIdParam = isset($args['id']) ? $args['id'] : null;
        if ($regionIdParam) {
            $regions = $this->context->daos->regionDao->regionForId($regionIdParam);
        } else {
            $regions = $this->context->daos->regionDao->regions();
        }
        return $regions;
    }

    public function resolveCities($rootValue, $args, $context, ResolveInfo $info)
    {
        $idParam = isset($args['id']) ? $args['id'] : null;
        if ($idParam) {
            $regions = $this->context->daos->cityDao->cityForId($idParam);
        } else {
            $regions = $this->context->daos->cityDao->cities();
        }
        return $regions;
    }
}
