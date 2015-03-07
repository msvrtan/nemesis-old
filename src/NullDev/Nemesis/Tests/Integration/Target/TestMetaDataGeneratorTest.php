<?php
namespace NullDev\Nemesis\Tests\Integration\Target;

use NullDev\Nemesis\Target\TestMetaDataFactory;
use NullDev\Nemesis\Target\TestMetaDataGenerator;
use stdClass;
use NullDev\Nemesis\Tests\Integration\IntegrationTestBase;

/**
 *
 */
class TestMetaDataGeneratorTest extends IntegrationTestBase
{
    /**
     * @var TestMetaDataGenerator
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $testMetaFactory = new TestMetaDataFactory();

        $this->object = new TestMetaDataGenerator($testMetaFactory);
    }

    /**
     *
     */
    public function testGenerate()
    {
        $this->markTestIncomplete('TODO');
    }
}
