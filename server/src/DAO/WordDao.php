<?php

namespace RailBaron\DAO;

use RailBaron\Context\Context;

class WordDao extends BaseDao
{

    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function randomWord($wordType)
    {
        return $this->getAll('SELECT word FROM word WHERE speech_part = ? ORDER BY RAND() LIMIT 1', [$wordType])[0]['word'];
    }
}
