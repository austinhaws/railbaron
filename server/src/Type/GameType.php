<?php

namespace RailBaron\Type;

use GraphQL\Type\Definition\Type;
use RailBaron\Context\Context;

class GameType extends BaseType
{
    public function __construct(Context $context)
    {
        parent::__construct($context, [
            'name' => 'Game',
            'fields' => function () use ($context) {
                return [
                    'id' => Type::id(),
                    'createTimestamp' => Type::string(),
                    'phrase' => Type::string(),
                ];
            },
        ]);
    }
}
