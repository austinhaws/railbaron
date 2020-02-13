<?php

namespace RailBaron\GraphQL;

use RailBaron\Context\Context;
use RailBaron\Type\CityType;
use RailBaron\Type\GameType;
use RailBaron\Type\PayoutType;
use RailBaron\Type\PlayerType;
use RailBaron\Type\QueryType;
use RailBaron\Type\RegionType;
use RailBaron\TypeInput\MutationType;
use RailBaron\TypeInput\PlayerInputType;
use ReflectionClass;

class TypeRegistry
{
    /** @var Context */
    private $context;

    /** @var CityType */
    private $cityType;
    /** @var GameType */
    private $gameType;
    /** @var MutationType */
    private $mutationType;
    /** @var PayoutType */
    private $payoutType;
    /** @var PlayerInputType */
    private $playerInputType;
    /** @var PlayerType */
    private $playerType;
    /** @var QueryType */
    private $queryType;
    /** @var RegionType */
    private $regionType;

    public function __construct(Context $context)
    {
        $this->context = $context;
    }

    private function getType($varName, $classPath)
    {
        if (!$this->$varName) {
            try {
                $reflection = new ReflectionClass($classPath);
                $this->$varName = $reflection->newInstanceArgs([$this->context]);
            } catch (\ReflectionException $e) {
                throw new \RuntimeException($e);
            }
        }

        return $this->$varName;
    }

    public function cityType()
    {
        return $this->getType('cityType', 'RailBaron\Type\CityType');
    }

    public function gameType()
    {
        return $this->getType('gameType', 'RailBaron\Type\GameType');
    }

    public function mutationType()
    {
        return $this->getType('mutationType', 'RailBaron\TypeInput\MutationType');
    }

    public function payoutType()
    {
        return $this->getType('payoutType', 'RailBaron\Type\PayoutType');
    }

    public function playerType()
    {
        return $this->getType('playerType', 'RailBaron\Type\PlayerType');
    }

    public function playerInputType()
    {
        return $this->getType('playerInputType', 'RailBaron\TypeInput\PlayerInputType');
    }

    public function queryType()
    {
        return $this->getType('queryType', 'RailBaron\Type\QueryType');
    }

    public function regionType()
    {
        return $this->getType('regionType', 'RailBaron\Type\RegionType');
    }
}
