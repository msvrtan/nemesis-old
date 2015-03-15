<?php

namespace NullDev\Nemesis\Target\Results;

use NullDev\Nemesis\Target\Import\ImportCollection;
use NullDev\Nemesis\Target\Import\ImportItem;
use NullDev\Nemesis\Target\Method\MethodCollection;
use NullDev\Nemesis\Target\Method\MethodItem;
use NullDev\Nemesis\Target\Property\PropertyCollection;
use NullDev\Nemesis\Target\Property\PropertyItem;

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

    public function addImportItem(ImportItem $importItem)
    {
        $this->importCollection->add($importItem);

        return true;
    }

    public function addPropertyItem(PropertyItem $propertyItem)
    {
        $this->propertyCollection->add($propertyItem);

        return true;
    }

    public function addMethodItem(MethodItem $methodItem)
    {
        $this->methodCollection->add($methodItem);

        return true;
    }
}
