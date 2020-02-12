<?php

namespace RailBaron\DAO;

use RailBaron\Context\Context;

class PlayerDao extends BaseDao
{

    public function __construct(Context $context)
    {
        parent::__construct($context);
        $this->defaultClassPath = 'RailBaron\Model\Player';
    }
}
