<?php

namespace RailBaron\DAO;

use RailBaron\Context\Context;

class GameDao extends BaseDao
{

    public function __construct(Context $context)
    {
        parent::__construct($context);
        $this->defaultClassPath = 'RailBaron\Model\Game';
    }

    public function gameByPhrase($phrase)
    {
        return $this->dbAssocToObject($this->getAll('SELECT * FROM game WHERE phrase = ?', [$phrase]));
    }

    public function gameById($gameId)
    {
        return $this->dbAssocToObject($this->getAll('SELECT * FROM game WHERE id = ?', [$gameId]));
    }

    public function createGameWithPhrase($phrase)
    {
        $gameId = $this->insert('INSERT INTO game (phrase) VALUES (?)', [$phrase]);
        return $this->gameById($gameId);
    }

    public function gamesByIds($ids)
    {
        return $this->recordsByIds($ids, 'game');
    }
}
