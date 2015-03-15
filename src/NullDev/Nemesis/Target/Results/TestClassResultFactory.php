<?php

namespace NullDev\Nemesis\Target\Results;

use NullDev\Nemesis\Target\Import\ImportCollection;
use NullDev\Nemesis\Target\Method\MethodCollection;
use NullDev\Nemesis\Target\Property\PropertyCollection;
use NullDev\Nemesis\Target\Results\TestClassResult;

class TestClassResultFactory
{
    /**
     * @return TestClassResult
     */
    public function create()
    {
        $importCollection   = new ImportCollection();
        $propertyCollection = new PropertyCollection();
        $methodCollection   = new MethodCollection();

        return new TestClassResult($importCollection, $propertyCollection, $methodCollection);
    }
}
