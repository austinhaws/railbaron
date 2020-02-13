<?php

namespace RailBaron\Context;

use RailBaron\Buffer\CityBuffer;
use RailBaron\Buffer\GameBuffer;
use RailBaron\Buffer\PayoutBuffer;
use RailBaron\Buffer\PlayerBuffer;
use RailBaron\Buffer\RegionBuffer;

class Buffers
{
    /** @var CityBuffer */
    public $cityBuffer;
    /** @var GameBuffer */
    public $gameBuffer;
    /** @var PayoutBuffer */
    public $payoutBuffer;
    /** @var PlayerBuffer */
    public $playerBuffer;
    /** @var RegionBuffer */
    public $regionBuffer;

    public function __construct(Context $context)
    {
        $this->cityBuffer = new CityBuffer($context);
        $this->gameBuffer = new GameBuffer($context);
        $this->payoutBuffer = new PayoutBuffer($context);
        $this->playerBuffer = new PlayerBuffer($context);
        $this->regionBuffer = new RegionBuffer($context);
    }
}
