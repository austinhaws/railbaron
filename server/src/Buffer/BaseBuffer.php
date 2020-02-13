<?php

namespace RailBaron\Buffer;

use RailBaron\Context\Context;

abstract class BaseBuffer
{

    /** @var array key is the id so this acts like a set; value is the object for the id, so if the value is "false" then it needs loaded */
    protected $buffer;
    /** @var Context */
    protected $context;

    abstract protected function loadBufferObjects($ids);

    public function __construct(Context $context)
    {
        $this->context = $context;
        $this->buffer = [];
    }

    public function loadBuffer()
    {
        $objects = $this->loadBufferObjects(array_filter(array_keys($this->buffer), function ($id) {
            return !$this->buffer[$id];
        }));
        array_walk($objects, function ($object) {
            $this->buffer[$object->id] = $object;
        });
    }

    public function addId($id)
    {
        $this->buffer[$id] = false;
    }

    public function addObject($object)
    {
        $this->addObjects([$object]);
    }

    public function addObjects($objects)
    {
        array_walk($objects, function ($object) {
            $this->buffer[$object->id] = $object;
        });
    }

    public function getObject($id)
    {
        return $this->buffer[$id];
    }
}
