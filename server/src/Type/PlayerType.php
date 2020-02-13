<?php

namespace RailBaron\Type;

use GraphQL\Type\Definition\Type;
use RailBaron\Context\Context;
use RailBaron\Model\Player;

class PlayerType extends BaseType
{
    public function __construct(Context $context)
    {
        parent::__construct($context, [
            'name' => 'Player',
            'fields' => function () use ($context) {
                return [
                    'id' => Type::id(),
                    'game' => $context->typeRegistry->gameType(),
                    'gameId' => Type::id(),
                    'fromCity' => $context->typeRegistry->cityType(),
                    'fromCityId' => Type::id(),
                    'homeCity' => $context->typeRegistry->cityType(),
                    'homeCityId' => Type::id(),
                    'name' => Type::string(),
                    'tawColor' => Type::string(),
                    'toCity' => $context->typeRegistry->cityType(),
                    'toCityId' => Type::id(),
                ];
            },
        ]);
    }

    public function resolveGame(Player $player)
    {
        return $this->context->daos->gameDao->gameById($player->gameId);
    }

    public function resolveFromCity(Player $player)
    {
        return $this->context->daos->cityDao->cityForId($player->fromCityId);
    }

    public function resolveToCity(Player $player)
    {
        return $this->context->daos->cityDao->cityForId($player->toCityId);
    }

    public function resolveHomeCity(Player $player)
    {
        return $this->context->daos->cityDao->cityForId($player->homeCityId);
    }
}
