<?php

namespace RailBaron\Service;

use GraphQL\Utils\Utils;
use RailBaron\Enum\PlayerColor;
use RailBaron\Model\Player;

class PlayerService extends BaseService
{
    /**
     * @param $gameId
     * @param $numberPlayers
     * @return array [Player]
     */
    public function createPlayers($gameId, $numberPlayers)
    {
        $existingPlayers = $this->context->daos->playerDao->playersForGameId($gameId);
        $existingNames = array_map(function ($player) {
            return $player->name;
        }, $existingPlayers ?: []);

        $availableColors = PlayerColor::getConstants();
        array_walk($existingPlayers, function (Player $player) use ($availableColors) {
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

    public function savePlayer($playerArgs, $gamePhrase)
    {
        // look up game by game phrase
        $game = $this->context->daos->gameDao->gameByPhrase($gamePhrase);
        $playerId = $this->context->utils->typeUtil->getArgFieldValue($playerArgs, 'id');
        if ($playerId) {
            // if player.id, lookup player by player id & make sure gameids match
            $player = $this->context->daos->playerDao->playerById($playerId);
            if ($player->gameId !== $game->id) {
                $player = $this->createPlayers($game->id, 1)[0];
            }
        } else {
            // else set player.gameid to gameid
            $player = $this->createPlayers($game->id, 1)[0];
        }

        $player->gameId = $game->id;
        Utils::assign($player, $playerArgs);

        // send new fields update to
        return $this->context->daos->playerDao->savePlayer($player);
    }
}
