<?php

namespace NullDev\Nemesis\Target\Results;

use NullDev\Nemesis\Target\Import\ImportCollection;
use NullDev\Nemesis\Target\Method\MethodCollection;
use NullDev\Nemesis\Target\Property\PropertyCollection;

class TestClassResult
{
    protected $className;
    protected $namespace;
    protected $extendsClassName;
    protected $importCollection;
    protected $propertyCollection;
    protected $methodCollection;

    public function __construct(
        ImportCollection $importCollection,
        PropertyCollection $propertyCollection,
        MethodCollection $methodCollection
    ) {
        $this->importCollection   = $importCollection;
        $this->propertyCollection = $propertyCollection;
        $this->methodCollection   = $methodCollection;
    }
}
