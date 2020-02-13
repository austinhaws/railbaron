<?php

namespace RailBaron\Type;

use GraphQL\Type\Definition\Type;
use RailBaron\Context\Context;
use RailBaron\Model\Game;

class GameType extends BaseType
{
    public function __construct(Context $context)
    {
        parent::__construct($context, [
            'name' => 'Game',
            'fields' => function () use ($context) {
                return [
                    'createTimestamp' => Type::string(),
                    'phrase' => Type::string(),
                    'players' => Type::listOf($context->typeRegistry->playerType()),
                ];
            },
        ]);
    }

    public function resolvePlayers(Game $game)
    {
        return $this->context->daos->playerDao->playersForGameId($game->id);
    }
}
