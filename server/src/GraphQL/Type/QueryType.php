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
                ],
                'payout' => [
                    'type' => $context->typeRegistry->payoutType(),
                    'description' => 'Calculates payout between two cities',
                    'args' => [
                        'city1Id' => Type::id(),
                        'city2Id' => Type::id(),
                    ]
                ]
            ],
        ]);
    }

    public function resolveRegions($rootValue, $args, $context, ResolveInfo $info)
    {
        $regionIdParam = $this->getArgFieldValue($args, 'id');
        if ($regionIdParam) {
            $regions = $this->context->daos->regionDao->regionForId($regionIdParam);
        } else {
            $regions = $this->context->daos->regionDao->regions();
        }
        return $regions;
    }

    public function resolveCities($rootValue, $args, $context, ResolveInfo $info)
    {
        $idParam = $this->getArgFieldValue($args, 'id');
        if ($idParam) {
            $regions = $this->context->daos->cityDao->cityForId($idParam);
        } else {
            $regions = $this->context->daos->cityDao->cities();
        }
        return $regions;
    }

    public function resolvePayout($rootValue, $args, $context, ResolveInfo $info)
    {
        $city1Id = $this->getArgFieldValue($args, 'city1Id');
        $city2Id = $this->getArgFieldValue($args, 'city2Id');
        return $this->context->daos->payoutDao->payoutForCityIds($city1Id, $city2Id);

    }
}
