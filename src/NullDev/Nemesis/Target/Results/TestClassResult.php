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

    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @param string $className
     */
    public function setClassName($className)
    {
        $this->className = $className;
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @param string $namespace
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
    }

    /**
     * @return string
     */
    public function getExtendsClassName()
    {
        return $this->extendsClassName;
    }

    /**
     * @param string $extendsClassName
     */
    public function setExtendsClassName($extendsClassName)
    {
        $this->extendsClassName = $extendsClassName;
    }
}
