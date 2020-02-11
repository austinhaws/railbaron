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
                    'description' => 'Returns region by id',
                    'args' => [
                        'id' => Type::id(),
                    ]
                ],
            ],
            'resolveField' => function($rootValue, $args, $context, ResolveInfo $info) {
                return $this->{$info->fieldName}($rootValue, $args, $context, $info);
            }
        ]);
    }

    public function regions($rootValue, $args, $context, ResolveInfo $info)
    {
        $regionIdParam = isset($args['id']) ? $args['id'] : null;
        if ($regionIdParam) {
            $regions = $this->context->daos->regionDao->regionForId($regionIdParam);
        } else {
            $regions = $this->context->daos->regionDao->regions();
        }
        return $regions;
    }
}
