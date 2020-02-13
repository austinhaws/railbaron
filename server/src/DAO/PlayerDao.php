<?php

namespace RailBaron\DAO;

use RailBaron\Context\Context;
use RailBaron\Model\Player;

class PlayerDao extends BaseDao
{

    public function __construct(Context $context)
    {
        parent::__construct($context);
        $this->defaultClassPath = 'RailBaron\Model\Player';
    }

    public function playersForGameId($gameId)
    {
        return $this->dbArrayToObjects($this->getAll('SELECT * FROM player WHERE game_id = ?', [$gameId]));
    }

    public function insertPlayer(Player $player)
    {
        return $this->playerById($this->insert("INSERT INTO player (game_id, to_city_id, from_city_id, home_city_id, taw_color, name) VALUES ({$this->createQuestionMarks(6)})", [
            $player->gameId,
            $player->toCityId,
            $player->fromCityId,
            $player->homeCityId,
            $player->tawColor,
            $player->name
        ]));
    }

    private function playerById($id)
    {
        return $this->dbAssocToObject(($this->getAll('SELECT * FROM player WHERE id = ?', [$id])));
    }
}
