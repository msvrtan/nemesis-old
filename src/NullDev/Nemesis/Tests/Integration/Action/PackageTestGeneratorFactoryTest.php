<?php
namespace NullDev\Nemesis\Tests\Integration\Action;

use NullDev\Nemesis\Action\PackageTestGeneratorFactory;
use NullDev\Nemesis\Tests\Integration\IntegrationTestBase;

/**
 *
 */
class PackageTestGeneratorFactoryTest extends IntegrationTestBase
{
    /**
     * @var PackageTestGeneratorFactory
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $sorceCollectionGenerator = $this->getSourceMetaCollectionGenerator();
        $testCollectionGenerator  = $this->getTestMetaCollectionGenerator();

        $this->object = new PackageTestGeneratorFactory($sorceCollectionGenerator, $testCollectionGenerator);
    }

    /**
     *
     */
    public function testCreate()
    {
        $this->markTestIncomplete('TODO');
    }
}
