<?php
namespace NullDev\Nemesis\Tests\Integration\Source;

use NullDev\Nemesis\Source\ClassMetaDataCollectionFactory;
use NullDev\Nemesis\Source\ClassMetaDataCollectionGenerator;
use stdClass;
use NullDev\Nemesis\Tests\Integration\IntegrationTestBase;
use Symfony\Component\Finder\Finder;

/**
 *
 */
class ClassMetaDataCollectionGeneratorTest extends IntegrationTestBase
{
    /**
     * @var ClassMetaDataCollectionGenerator
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $factory             = new ClassMetaDataCollectionFactory();
        $finder              = new Finder();
        $sourceMetaGenerator = $this->getSourceMetaGenerator();

        $this->object = new ClassMetaDataCollectionGenerator($factory, $finder, $sourceMetaGenerator);
    }

    /**
     *
     */
    public function testGenerate()
    {
        $this->markTestIncomplete('TODO');
    }
}
