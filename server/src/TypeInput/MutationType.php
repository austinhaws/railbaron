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
                'deletePlayer' => [
                    'type' => $context->typeRegistry->gameType(),
                    'description' => 'Deletes a player from a game',
                    'args' => [
                        'playerId' => Type::nonNull(Type::int()),
                        'gamePhrase' => Type::nonNull(Type::string()),
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

    public function resolveDeletePlayer($rootValue, $args, $context, ResolveInfo $info)
    {
        $gamePhrase = $this->getArgFieldValue($args, 'gamePhrase');
        $playerId = $this->getArgFieldValue($args, 'playerId');
        $this->context->services->playerService->deletePlayer($playerId, $gamePhrase);
        return $this->context->daos->gameDao->gameByPhrase($gamePhrase);
    }
}
