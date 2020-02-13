<?php

namespace RailBaron\Buffer;

class RegionBuffer extends BaseBuffer
{

    public function loadBufferObjects($ids)
    {
        return $this->context->daos->regionDao->regionsByIds($ids);
    }
}
