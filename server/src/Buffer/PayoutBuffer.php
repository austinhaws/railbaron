<?php

namespace RailBaron\Buffer;

class PayoutBuffer extends BaseBuffer
{

    public function loadBufferObjects($ids)
    {
        return $this->context->daos->payoutDao->payoutsByIds($ids);
    }
}
