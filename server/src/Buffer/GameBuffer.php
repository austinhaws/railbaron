<?php

namespace RailBaron\Buffer;

class GameBuffer extends BaseBuffer
{

    public function loadBufferObjects($ids)
    {
        return $this->context->daos->gameDao->gamesByIds($ids);
    }
}
