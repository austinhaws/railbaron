<?php

namespace RailBaron\Type;

use GraphQL\Type\Definition\ObjectType;
use RailBaron\Context\Context;

class BaseType extends ObjectType
{
    /** @var Context */
    protected $context;

    public function __construct(Context $context, array $config)
    {
        $this->context = $context;

        $context->utils->typeUtil->addResolveFieldConfig($this, $config);

        parent::__construct($config);
    }
}
