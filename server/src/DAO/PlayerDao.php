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

    /**
     * @param Player $player
     * @return Player
     */
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

    /**
     * @param $id
     * @return Player
     */
    public function playerById($id)
    {
        return $this->dbAssocToObject(($this->getAll('SELECT * FROM player WHERE id = ?', [$id])));
    }

    public function deletePlayerById($id)
    {
        return $this->execute('DELETE FROM player WHERE id = ?', [$id]);
    }

    public function savePlayer(Player $player)
    {
        if ($player->id) {
            $this->updatePlayer($player);
        } else {
            $player = $this->insertPlayer($player);
        }
        return $player;
    }

    private function updatePlayer(Player $player)
    {
        $this->execute("UPDATE player SET
                game_id = ?,
                to_city_id = ?,
                from_city_id = ?,
                home_city_id = ?,
                taw_color = ?,
                name = ?
            WHERE id = ?",
            [
                $player->gameId,
                $player->toCityId,
                $player->fromCityId,
                $player->homeCityId,
                $player->tawColor,
                $player->name,
                $player->id
            ]
        );
    }

    public function playersByIds($ids)
    {
        return $this->recordsByIds($ids, 'player');
    }
}
