<?php
namespace NullDev\Nemesis\Tests\Unit\Source;

use NullDev\Nemesis\Source\ClassMetaDataCollectionFactory;
use Mockery as m;

/**
 *
 */
class ClassMetaDataCollectionFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ClassMetaDataCollectionFactory
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new ClassMetaDataCollectionFactory();
    }

    /**
     *
     */
    public function testCreate()
    {
        $result = $this->object->create();
        $this->assertInstanceOf('NullDev\Nemesis\Source\ClassMetaDataCollection', $result);
    }
}
