<?php

namespace NullDev\Nemesis\Action;

use NullDev\Nemesis\Action\PackageTestGenerator;
use Symfony\Component\Finder\Finder;
use NullDev\Nemesis\Source\ClassMetaDataGenerator;
use NullDev\Nemesis\Source\ClassMetaDataCollectionGenerator;
use NullDev\Nemesis\Target\TestMetaDataCollectionGenerator;
use NullDev\Nemesis\PackageSettings\Settings;

class PackageTestGeneratorFactory
{
    protected $sorceCollectionGenerator;
    protected $testCollectionGenerator;

    /**
     * @param ClassMetaDataCollectionGenerator $sorceCollectionGenerator
     * @param TestMetaDataCollectionGenerator  $testCollectionGenerator
     */
    public function __construct(
        ClassMetaDataCollectionGenerator $sorceCollectionGenerator,
        TestMetaDataCollectionGenerator $testCollectionGenerator
    ) {
        $this->sorceCollectionGenerator = $sorceCollectionGenerator;
        $this->testCollectionGenerator  = $testCollectionGenerator;
    }

    /**
     * @param Settings $settings
     *
     * @return PackageTestGenerator
     */
    public function create(Settings $settings)
    {
        return new PackageTestGenerator($this->sorceCollectionGenerator, $this->testCollectionGenerator, $settings);
    }
}
