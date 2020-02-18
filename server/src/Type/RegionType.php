<?php

namespace RailBaron\Type;

use GraphQL\Type\Definition\Type;
use RailBaron\Context\Context;
use RailBaron\Model\Region;

class RegionType extends BaseType
{
    public function __construct(Context $context)
    {
        parent::__construct($context, [
            'name' => 'Region',
            'fields' => function () use ($context) {
                return [
                    'id' => Type::id(),
                    'name' => Type::string(),
                    'abbreviation' => Type::string(),
                    'cities' => [
                        'type' => Type::listOf($context->typeRegistry->cityType()),
                        'args' => [
                            'id' => Type::int(),
                        ]
                    ],
                ];
            },
        ]);
    }

    public function resolveCities(Region $region)
    {
        return $this->context->daos->cityDao->citiesForRegionId($region->id);
    }
}
