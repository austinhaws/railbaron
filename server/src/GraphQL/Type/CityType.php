<?php
namespace RailBaron\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use RailBaron\Context\Context;

class CityType extends BaseType
{
    public function __construct(Context $context)
    {
        parent::__construct($context, [
            'name' => 'City',
            'fields' => function() {
                return [
                    'id' => Type::id(),
                    'regionId' => Type::id(),
                    'name' => Type::string(),
                ];
            },
        ]);
    }
}
