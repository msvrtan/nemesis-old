<?php

namespace NullDev\Nemesis\Target;

use NullDev\Nemesis\Target\TestMetaDataCollectionFactory;
use NullDev\Nemesis\Target\TestMetaDataGenerator;
use NullDev\Nemesis\Source\ClassMetaDataCollection;
use NullDev\Nemesis\PackageSettings\Settings;

class TestMetaDataCollectionGenerator
{
    protected $collectionFactory;

    protected $generator;

    public function __construct(TestMetaDataCollectionFactory $collectionFactory, TestMetaDataGenerator $generator)
    {
        $this->collectionFactory = $collectionFactory;
        $this->generator         = $generator;
    }

    public function generate(Settings $packageSettings, ClassMetaDataCollection $sourceCollection)
    {
        $testCollection = $this->collectionFactory->create();

        foreach ($sourceCollection->getAll() as $sourceCodeMetaData) {

            //@TODO: add integration and functional tests
            //@todo: check if test is enabled!

            $testMetaData = $this->generator->generate(
                $packageSettings->getSourceCode(),
                $packageSettings->getUnitTest(),
                $sourceCodeMetaData
            );

            $testCollection->add($testMetaData);
        }

        return $testCollection;
    }
}
