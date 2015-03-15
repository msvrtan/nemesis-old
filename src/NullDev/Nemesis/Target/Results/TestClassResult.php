<?php

namespace NullDev\Nemesis\Target\Results;

use NullDev\Nemesis\Target\Import\ImportCollection;

class TestClassResult
{
    protected $className;
    protected $namespace;
    protected $extendsClassName;
    protected $importCollection;
    protected $propertyCollection;
    protected $methodCollection;

    public function __construct()
    {
        $this->importCollection = new ImportCollection();
        //
    }
}
