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
                'savePlayer' => [
                    'type' => $context->typeRegistry->playerType(),
                    'description' => 'Save a player to a game',
                    'args' => [
                        'player' => Type::nonNull($context->typeRegistry->playerInputType()),
                        'gamePhrase' => Type::nonNull(Type::string()),
                    ]
                ],
            ],
        ]);
    }

    public function resolveStartNewGame($rootValue, $args, $context, ResolveInfo $info)
    {
        $numberPlayers = $this->context->utils->typeUtil->getArgFieldValue($args, 'numberPlayers');
        return $this->context->services->gameService->startNewGame($numberPlayers);
    }

    public function resolveDeletePlayer($rootValue, $args, $context, ResolveInfo $info)
    {
        $gamePhrase = $this->context->utils->typeUtil->getArgFieldValue($args, 'gamePhrase');
        $playerId = $this->context->utils->typeUtil->getArgFieldValue($args, 'playerId');
        $this->context->services->playerService->deletePlayer($playerId, $gamePhrase);
        return $this->context->daos->gameDao->gameByPhrase($gamePhrase);
    }

    public function resolveSavePlayer($rootValue, $args, $context, ResolveInfo $info)
    {
        return $this->context->services->playerService->savePlayer(
            $this->context->utils->typeUtil->getArgFieldValue($args, 'player'),
            $this->context->utils->typeUtil->getArgFieldValue($args, 'gamePhrase')
        );
    }
}
