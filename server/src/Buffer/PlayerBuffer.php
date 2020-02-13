<?php

namespace RailBaron\Buffer;

class PlayerBuffer extends BaseBuffer
{

    public function loadBufferObjects($ids)
    {
        return $this->context->daos->playerDao->playersByIds($ids);
    }
}
