<?php

namespace NullDev\Nemesis\Source;

use NullDev\Nemesis\PackageSettings\Settings;
use NullDev\Nemesis\Source\ClassMetaDataCollectionFactory;
use Symfony\Component\Finder\Finder;
use NullDev\Nemesis\Source\ClassMetaDataGenerator;

class ClassMetaDataCollectionGenerator
{
    protected $factory;
    protected $finder;
    protected $sourceMetaGenerator;

    public function __construct(
        ClassMetaDataCollectionFactory $factory,
        Finder $finder,
        ClassMetaDataGenerator $sourceMetaGenerator
    ) {
        $this->factory             = $factory;
        $this->finder              = $finder;
        $this->sourceMetaGenerator = $sourceMetaGenerator;
    }

    /**
     * @param Settings $settings
     *
     * @return ClassMetaDataCollection
     */
    public function generate(Settings $settings)
    {
        $collection = $this->factory->create();

        $files = $this->finder
            ->files()
            ->name('*.php')
            ->in($settings->getSourceCode()->getRootPath())
            ->exclude($settings->getSourceCode()->getExcludeFolders());

        foreach ($files as $filePath) {
            $sourceMeta = $this->sourceMetaGenerator->generate($filePath);

            if ($sourceMeta instanceof ClassMetaData) {
                $collection->add($sourceMeta);
            }
        }

        return $collection;
    }
}
