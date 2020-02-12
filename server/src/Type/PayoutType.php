<?php
namespace RailBaron\Type;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use RailBaron\Context\Context;

class PayoutType extends BaseType
{
    public function __construct(Context $context)
    {
        parent::__construct($context, [
            'name' => 'Payout',
            'fields' => function () use ($context) {
                return [
                    'id' => Type::id(),
                    'city1' => $context->typeRegistry->cityType(),
                    'city2' => $context->typeRegistry->cityType(),
                    'city1Id' => Type::id(),
                    'city2Id' => Type::id(),
                    'payout' => Type::int(),
                ];
            },
        ]);
    }

    private function resolveCity($dbArray, ResolveInfo $info)
    {
        return $this->context->daos->cityDao->cityForId($dbArray->{"{$info->fieldName}Id"});
    }

    public function resolveCity1($dbArray, $args, $context, ResolveInfo $info)
    {
        return $this->resolveCity($dbArray, $info);
    }
    public function resolveCity2($dbArray, $args, $context, ResolveInfo $info)
    {
        return $this->resolveCity($dbArray, $info);
    }
}
