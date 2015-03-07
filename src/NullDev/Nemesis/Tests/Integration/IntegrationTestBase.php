<?php
namespace NullDev\Nemesis\Tests\Integration;

use NullDev\Examiner\FileParser\PhpFileParseResultFactory;
use NullDev\Nemesis\Action\PackageTestGenerator;
use Mockery as m;
use NullDev\Nemesis\Action\PackageTestGeneratorFactory;
use NullDev\Nemesis\PackageSettings\SettingsFactory;
use NullDev\Nemesis\PackageSettings\SourceMetaDataFactory;
use NullDev\Nemesis\PackageSettings\TestMetaDataFactory;
use NullDev\Nemesis\PackageSettingsProviders\Symfony2SettingsProvider;
use NullDev\Nemesis\Source\ClassMetaDataCollectionGenerator;
use NullDev\Nemesis\Source\ClassMetaDataFactory;
use NullDev\Nemesis\Target\TestMetaDataCollectionFactory;
use NullDev\Nemesis\Target\TestMetaDataCollectionGenerator;
use NullDev\Nemesis\Target\TestMetaDataGenerator;
use Symfony\Component\Finder\Finder;
use NullDev\Nemesis\Source\ClassMetaDataGenerator;
use NullDev\Examiner\FileParser\PhpFileParser;
use NullDev\Examiner\PhpFileLoader;
use NullDev\Examiner\ReflectionClassGenerator;
use NullDev\Nemesis\Source\ClassMetaDataCollectionFactory;

/**
 * @SuppressWarnings("PHPMD.CouplingBetweenObjects")
 */
class IntegrationTestBase extends \PHPUnit_Framework_TestCase
{
    protected function getPackageTestGeneratorFactory()
    {
        $packageTestGeneratorFactory = new PackageTestGeneratorFactory(
            $this->getSourceMetaCollectionGenerator(),
            $this->getTestMetaCollectionGenerator()
        );

        return $packageTestGeneratorFactory;
    }

    public function getSymfony2SettingsProvider()
    {
        $settingsFactory = new Symfony2SettingsProvider(
            new SettingsFactory(),
            new SourceMetaDataFactory(),
            new TestMetaDataFactory()
        );

        return $settingsFactory;
    }

    protected function getSourceMetaCollectionGenerator()
    {
        $collectionGenerator = new ClassMetaDataCollectionGenerator(
            new ClassMetaDataCollectionFactory(),
            new Finder(),
            $this->getSourceMetaGenerator()
        );

        return $collectionGenerator;
    }

    protected function getTestMetaCollectionGenerator()
    {
        $collectionGenerator = new TestMetaDataCollectionGenerator(
            new TestMetaDataCollectionFactory(),
            new TestMetaDataGenerator(
                new \NullDev\Nemesis\Target\TestMetaDataFactory()
            )
        );

        return $collectionGenerator;
    }

    protected function getSourceMetaGenerator()
    {
        $sourceMetaGenerator = new ClassMetaDataGenerator(
            new ClassMetaDataFactory(),
            $this->getPhpFileParser(),
            new PhpFileLoader(),
            new ReflectionClassGenerator()
        );

        return $sourceMetaGenerator;
    }

    protected function getPhpFileParser()
    {
        $phpFileParser = new PhpFileParser(
            new PhpFileParseResultFactory()
        );

        return $phpFileParser;
    }
}
