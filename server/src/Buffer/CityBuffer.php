<?php

namespace RailBaron\Buffer;

class CityBuffer extends BaseBuffer
{

    public function loadBufferObjects($ids)
    {
        return $this->context->daos->cityDao->citiesByIds($ids);
    }
}
