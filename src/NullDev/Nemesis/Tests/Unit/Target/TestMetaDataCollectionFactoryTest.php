<?php
namespace NullDev\Nemesis\Tests\Unit\Target;

use NullDev\Nemesis\Target\TestMetaDataCollectionFactory;
use Mockery as m;

/**
 *
 */
class TestMetaDataCollectionFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TestMetaDataCollectionFactory
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new TestMetaDataCollectionFactory();
    }

    /**
     *
     */
    public function testCreate()
    {
        $result = $this->object->create();
        $this->assertInstanceOf('NullDev\Nemesis\Target\TestMetaDataCollection', $result);
    }
}
