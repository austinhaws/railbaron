<?php

namespace App\Http\Common\Models;

class MinMax
{
    /** @var int */
    public $min;
    /** @var int */
    public $max;

    public function __construct($min, $max)
    {
        $this->min = $min;
        $this->max = $max;
    }
}
