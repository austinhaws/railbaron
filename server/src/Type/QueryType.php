<?php

namespace RailBaron\Type;

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
                        'city1Id' => Type::nonNull(Type::id()),
                        'city2Id' => Type::nonNull(Type::id()),
                    ]
                ],
                'randomCity' => [
                    'type' => $context->typeRegistry->cityType(),
                    'description' => 'Randomly select a city from an optionally predefined region',
                    'args' => [
                        'regionId' => Type::id(),
                    ],
                ],
            ],
        ]);
    }

    public function resolveRegions($rootValue, $args, $context, ResolveInfo $info)
    {
        $regionIdParam = $this->context->utils->typeUtil->getArgFieldValue($args, 'id');
        if ($regionIdParam) {
            $regions = [$this->context->daos->regionDao->regionForId($regionIdParam)];
            $this->context->buffers->regionBuffer->addObject($regions);
        } else {
            $regions = $this->context->daos->regionDao->regions();
            $this->context->buffers->regionBuffer->addObjects($regions);
        }
        return $regions;
    }

    public function resolveCities($rootValue, $args, $context, ResolveInfo $info)
    {
        $idParam = $this->context->utils->typeUtil->getArgFieldValue($args, 'id');
        if ($idParam) {
            $cities = [$this->context->daos->cityDao->cityForId($idParam)];
            $this->context->buffers->cityBuffer->addObject($cities);
        } else {
            $cities = $this->context->daos->cityDao->cities();
            $this->context->buffers->cityBuffer->addObjects($cities);
        }
        return $cities;
    }

    public function resolvePayout($rootValue, $args, $context, ResolveInfo $info)
    {
        $city1Id = $this->context->utils->typeUtil->getArgFieldValue($args, 'city1Id');
        $city2Id = $this->context->utils->typeUtil->getArgFieldValue($args, 'city2Id');
        return $this->context->daos->payoutDao->payoutForCityIds($city1Id, $city2Id);
    }

    public function resolveRandomCity($rootValue, $args, $context, ResolveInfo $info)
    {
        return $this->context->services->cityService->randomCity($this->context->utils->typeUtil->getArgFieldValue($args, 'regionId'));
    }
}
