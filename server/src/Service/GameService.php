<?php

namespace RailBaron\Service;

class GameService extends BaseService
{
    const NUM_PHRASE_WORDS = 1;

    public function startNewGame($numberPlayers)
    {
        do {
            $phrase = $this->context->services->wordService->getWords(self::NUM_PHRASE_WORDS);
        } while ($this->context->daos->gameDao->gameByPhrase($phrase));

        $game = $this->context->daos->gameDao->createGameWithPhrase($phrase);

        $this->context->services->playerService->createPlayers($game->id, $numberPlayers ?: 4);

        return $game;
    }
}
