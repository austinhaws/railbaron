<?php

namespace RailBaron\Service;

use RailBaron\Enum\PlayerColor;
use RailBaron\Model\Player;

class PlayerService extends BaseService
{
    public function createPlayers($gameId, $numberPlayers)
    {
        $existingPlayers = $this->context->daos->playerDao->playersForGameId($gameId);
        $existingNames = array_map(function ($player) {
            return $player->name;
        }, $existingPlayers ?: []);

        $availableColors = PlayerColor::getConstants();
        array_walk($existingNames, function (Player $player) use ($availableColors) {
            if (($key = array_search($player->tawColor, $availableColors)) !== false) {
                unset($availableColors[$key]);
            }
        });

        $players = [];
        for ($playerLoop = 0; $playerLoop < $numberPlayers; $playerLoop++) {
            // make sure name is unique
            $playerNumber = $playerLoop + 1;
            $newName = "Player {$playerNumber}";
            while (false !== array_search($newName, $existingNames)) {
                $newName .= '!';
            }

            // find available colors
            shuffle($availableColors);
            $color = array_pop($availableColors);

            $homeCity = $this->context->services->cityService->randomCity(null);

            do {
                $toCity = $this->context->services->cityService->randomCity(null);
            } while ($toCity->regionId === $homeCity->regionId);

            // create new player
            $player = new Player();
            $player->gameId = $gameId;
            $player->toCityId = $toCity->id;
            $player->fromCityId = $homeCity->id;
            $player->homeCityId = $homeCity->id;
            $player->tawColor = $color;
            $player->name = $newName;
            $insertedPlayer = $this->context->daos->playerDao->insertPlayer($player);

            $existingPlayers[] = $insertedPlayer;
            $players[] = $insertedPlayer;
        }
        return $players;
    }

    public function deletePlayer($playerId, $gamePhrase)
    {
        // make sure player belongs to the game
        $game = $this->context->daos->gameDao->gameByPhrase($gamePhrase);
        $players = $this->context->daos->playerDao->playersForGameId($game->id);
        $player = $this->context->services->arrayService->find($players, function ($player) use ($playerId) {
            return $player->id === "$playerId";
        });
        $isDeleted = false;
        if ($player !== null) {
            $this->context->daos->playerDao->deletePlayerById($player->id);
            $isDeleted = true;
        }
        return $isDeleted;
    }
}
