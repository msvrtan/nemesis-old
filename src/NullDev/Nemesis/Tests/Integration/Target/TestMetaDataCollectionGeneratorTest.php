<?php
namespace NullDev\Nemesis\Tests\Integration\Target;

use NullDev\Nemesis\Target\TestMetaDataCollectionFactory;
use NullDev\Nemesis\Target\TestMetaDataCollectionGenerator;
use NullDev\Nemesis\Target\TestMetaDataGenerator;
use stdClass;
use NullDev\Nemesis\Tests\Integration\IntegrationTestBase;

/**
 *
 */
class TestMetaDataCollectionGeneratorTest extends IntegrationTestBase
{
    /**
     * @var TestMetaDataCollectionGenerator
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $collectionFactory = new TestMetaDataCollectionFactory();
        $generator         = new TestMetaDataGenerator(
            new \NullDev\Nemesis\Target\TestMetaDataFactory()
        );

        $this->object = new TestMetaDataCollectionGenerator($collectionFactory, $generator);
    }

    /**
     *
     */
    public function testGenerate()
    {
        $this->markTestIncomplete('TODO');
    }
}
