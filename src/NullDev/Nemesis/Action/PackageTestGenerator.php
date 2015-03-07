<?php

namespace NullDev\Nemesis\Action;

use NullDev\Nemesis\PackageSettings\Settings;
use NullDev\Nemesis\PackageSettings\SourceMetaData;
use NullDev\Nemesis\Source\ClassMetaDataCollectionGenerator;
use NullDev\Nemesis\Source\ClassMetaDataGenerator;
use NullDev\Nemesis\Target\TestMetaDataCollectionGenerator;

class PackageTestGenerator
{
    protected $sourceCollectionGenerator;

    protected $testCollectionGenerator;

    protected $settings;

    /**
     * @param ClassMetaDataCollectionGenerator $sourceCollectionGenerator
     * @param TestMetaDataCollectionGenerator  $testCollectionGenerator
     * @param Settings                         $settings
     */
    public function __construct(
        ClassMetaDataCollectionGenerator $sourceCollectionGenerator,
        TestMetaDataCollectionGenerator $testCollectionGenerator,
        Settings $settings
    ) {
        $this->sourceCollectionGenerator = $sourceCollectionGenerator;
        $this->testCollectionGenerator   = $testCollectionGenerator;
        $this->settings                  = $settings;
    }

    public function runAction()
    {
        $testCollection = $this->generateTestCollection();

        return $testCollection;
    }

    public function generateTestCollection()
    {
        $sourceCollection = $this->sourceCollectionGenerator->generate($this->settings);

        $testCollection = $this->testCollectionGenerator->generate($this->settings, $sourceCollection);

        return $testCollection;
    }
}
