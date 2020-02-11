<?php
namespace RailBaron\GraphQL\Type;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use RailBaron\Context\Context;

class CityType extends BaseType
{
    public function __construct(Context $context)
    {
        parent::__construct($context, [
            'name' => 'City',
            'fields' => function () use ($context) {
                return [
                    'id' => Type::id(),
                    'regionId' => Type::id(),
                    'name' => Type::string(),
                    'payouts' => Type::listOf($context->typeRegistry->payoutType()),
                    'region' => $context->typeRegistry->regionType(),
                ];
            },
        ]);
    }

    public function resolvePayouts($dbArray, $args, $context, ResolveInfo $info)
    {
        return $this->context->daos->payoutDao->payoutsForCityId($dbArray->id);
    }

    public function resolveRegion($dbArray, $args, $context, ResolveInfo $info)
    {
        return $this->context->daos->regionDao->regionForId($dbArray->regionId);
    }
}
