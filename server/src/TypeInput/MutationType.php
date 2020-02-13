<?php

namespace RailBaron\TypeInput;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use RailBaron\Context\Context;
use RailBaron\Type\BaseType;

class MutationType extends BaseType
{
    public function __construct(Context $context)
    {
        parent::__construct($context, [
            'name' => 'Mutation',
            'fields' => [
                'startNewGame' => [
                    'type' => $context->typeRegistry->gameType(),
                    'description' => 'Creates a new game',
                    'args' => [
                        'numberPlayers' => Type::int(),
                    ]
                ],
            ],
        ]);
    }

    public function resolveStartNewGame($rootValue, $args, $context, ResolveInfo $info)
    {
        $numberPlayers = $this->getArgFieldValue($args, 'numberPlayers');
        return $this->context->services->gameService->startNewGame($numberPlayers);
    }
}
