<?php

namespace NullDev\Nemesis\Target\TestClassGenerators;

use NullDev\Nemesis\Target\Import\ImportItem;
use NullDev\Nemesis\Target\Property\PropertyItem;
use NullDev\Nemesis\Target\Results\TestClassResultFactory;
use NullDev\Nemesis\Source\ClassMetaData;
use NullDev\Nemesis\Target\TestMetaData;

class MockeryUnitTestGenerator
{
    protected $testClassResultFactory;

    /**
     * @param TestClassResultFactory $testClassResultFactory
     */
    public function __construct(
        TestClassResultFactory $testClassResultFactory
    ) {
        $this->testClassResultFactory = $testClassResultFactory;
    }

    /**
     * @param ClassMetaData $sourceMeta
     * @param TestMetaData  $targetMeta
     *
     * @return \NullDev\Nemesis\Target\Results\TestClassResult
     */
    public function generate(ClassMetaData $sourceMeta, TestMetaData $targetMeta)
    {
        $result = $this->testClassResultFactory->create();

        $result->setClassName($targetMeta->getClassName());
        $result->setNamespace($targetMeta->getNamespace());
        $result->setExtendsClassName('\PHPUnit_Framework_TestCase');

        $result->addImportItem(new ImportItem($sourceMeta->getFullyQualifiedClassName()));
        $result->addImportItem(new ImportItem('Mockery', 'm'));

        $result->addPropertyItem(new PropertyItem('object'));

        return $result;
    }
}
