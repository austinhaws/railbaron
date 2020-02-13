<?php

namespace RailBaron\TypeInput;

use GraphQL\Type\Definition\InputObjectType;
use RailBaron\Context\Context;

class BaseInputType extends InputObjectType
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
