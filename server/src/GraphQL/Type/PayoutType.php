<?php
namespace RailBaron\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use RailBaron\Context\Context;

class PayoutType extends BaseType
{
    public function __construct(Context $context)
    {
        parent::__construct($context, [
            'name' => 'Payout',
            'fields' => function() {
                return [
                    'id' => Type::id(),
                    'city1Id' => Type::id(),
                    'city2Id' => Type::id(),
                    'payout' => Type::int(),
                ];
            },
        ]);
    }
}
