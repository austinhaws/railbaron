<?php

namespace RailBaron\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use RailBaron\Context\Context;

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

    public function resolveCities(array $region)
    {
        return Context::instance()->services->cityService->getCitiesForRegion($region['id']);
    }
}
