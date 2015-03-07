<?php
namespace NullDev\Nemesis\Tests\Integration\Source;

use NullDev\Examiner\PhpFileLoader;
use NullDev\Examiner\ReflectionClassGenerator;
use NullDev\Nemesis\Source\ClassMetaDataFactory;
use NullDev\Nemesis\Source\ClassMetaDataGenerator;
use stdClass;
use NullDev\Nemesis\Tests\Integration\IntegrationTestBase;

/**
 *
 */
class ClassMetaDataGeneratorTest extends IntegrationTestBase
{
    /**
     * @var ClassMetaDataGenerator
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $factory             = new ClassMetaDataFactory();
        $fileParser          = $this->getPhpFileParser();
        $fileLoader          = new PhpFileLoader();
        $reflectionGenerator = new ReflectionClassGenerator();

        $this->object = new ClassMetaDataGenerator($factory, $fileParser, $fileLoader, $reflectionGenerator);
    }

    /**
     *
     */
    public function testGenerate()
    {
        $this->markTestIncomplete('TODO');
    }
}
