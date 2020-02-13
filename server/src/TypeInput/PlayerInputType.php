<?php

namespace RailBaron\TypeInput;

use GraphQL\Type\Definition\Type;
use RailBaron\Context\Context;

class PlayerInputType extends BaseInputType
{
    public function __construct(Context $context)
    {
        parent::__construct($context, [
            'name' => 'PlayerInput',
            'fields' => [
                'id' => [
                    'type' => Type::id(),
                    'description' => 'Player id'
                ],
                'toCityId' => [
                    'type' => Type::id(),
                    'description' => 'Destination city id'
                ],
                'fromCityId' => [
                    'type' => Type::id(),
                    'description' => 'From city id'
                ],
                'homeCityId' => [
                    'type' => Type::id(),
                    'description' => 'Home city id'
                ],
                'tawColor' => [
                    'type' => Type::string(),
                    'description' => 'Taw color'
                ],
                'name' => [
                    'type' => Type::string(),
                    'description' => 'Name of player'
                ],
            ]
        ]);
    }
}
