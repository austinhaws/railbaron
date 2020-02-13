<?php
namespace RailBaron\Type;

use GraphQL\Deferred;
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
        $this->context->buffers->regionBuffer->addId($dbArray->regionId);

        return new Deferred(function () use ($dbArray) {
            $this->context->buffers->regionBuffer->loadBuffer();
            return $this->context->buffers->regionBuffer->getObject($dbArray->regionId);
        });
    }
}
