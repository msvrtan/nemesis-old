<?php
namespace NullDev\Nemesis\Tests\Integration\Action;

use NullDev\Examiner\FileParser\PhpFileParseResultFactory;
use NullDev\Nemesis\Action\PackageTestGenerator;
use Mockery as m;
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
use NullDev\Nemesis\Tests\Integration\IntegrationTestBase;

class PackageTestGeneratorTest extends IntegrationTestBase
{
    /**
     *
     */
    public function testRunAction()
    {
        $rootPath = NEMESIS_TESTDATA_PATH.'/application/src/Vendor/SomeBundle';

        $sourceCollectionGenerator = $this->getSourceMetaCollectionGenerator();
        $testCollectionGenerator   = $this->getTestMetaCollectionGenerator();

        $settingsFactory = $this->getSymfony2SettingsProvider();

        $settings = $settingsFactory->generate($rootPath);

        $obj = new PackageTestGenerator($sourceCollectionGenerator, $testCollectionGenerator, $settings);

        $result = $obj->runAction();

        //var_dump($result);

        $this->assertNotNull($result);
    }

    /**
     *
     */
    public function testGenerateTestCollection()
    {
        $rootPath = NEMESIS_TESTDATA_PATH.'/application/src/Vendor/SomeBundle';

        $sourceCollectionGenerator = $this->getSourceMetaCollectionGenerator();
        $testCollectionGenerator   = $this->getTestMetaCollectionGenerator();

        $settingsFactory = $this->getSymfony2SettingsProvider();

        $settings = $settingsFactory->generate($rootPath);

        $obj = new PackageTestGenerator($sourceCollectionGenerator, $testCollectionGenerator, $settings);

        $result = $obj->generateTestCollection();

        $this->assertEquals('AdvancedCalculatorTest', $result->getAll()[0]->getClassName());
        $this->assertEquals(
            'Vendor\SomeBundle\Tests\Unit\Calculator\AdvancedCalculatorTest',
            $result->getAll()[0]->getFullyQualifiedClassName()
        );
        $this->assertEquals(
            $rootPath.'/Tests/Unit/Calculator/AdvancedCalculatorTest.php',
            $result->getAll()[0]->getFilePath()
        );

        $this->assertEquals('SimpleCalculatorTest', $result->getAll()[1]->getClassName());
        $this->assertEquals(
            'Vendor\SomeBundle\Tests\Unit\Calculator\SimpleCalculatorTest',
            $result->getAll()[1]->getFullyQualifiedClassName()
        );
        $this->assertEquals(
            $rootPath.'/Tests/Unit/Calculator/SimpleCalculatorTest.php',
            $result->getAll()[1]->getFilePath()
        );

        $this->assertEquals('FinalCalculatorTest', $result->getAll()[2]->getClassName());
        $this->assertEquals(
            'Vendor\SomeBundle\Tests\Unit\Calculator\FinalCalculatorTest',
            $result->getAll()[2]->getFullyQualifiedClassName()
        );
        $this->assertEquals(
            $rootPath.'/Tests/Unit/Calculator/FinalCalculatorTest.php',
            $result->getAll()[2]->getFilePath()
        );

        $this->assertEquals('BasicCalculatorTest', $result->getAll()[3]->getClassName());
        $this->assertEquals(
            'Vendor\SomeBundle\Tests\Unit\Calculator\BasicCalculatorTest',
            $result->getAll()[3]->getFullyQualifiedClassName()
        );
        $this->assertEquals(
            $rootPath.'/Tests/Unit/Calculator/BasicCalculatorTest.php',
            $result->getAll()[3]->getFilePath()
        );

        //var_dump($result);
    }
}
