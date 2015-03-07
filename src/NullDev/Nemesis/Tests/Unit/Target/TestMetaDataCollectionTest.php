<?php
namespace NullDev\Nemesis\Tests\Unit\Target;

use NullDev\Nemesis\Target\TestMetaDataCollection;
use Mockery as m;

/**
 *
 */
class TestMetaDataCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TestMetaDataCollection
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new TestMetaDataCollection();
    }

    /**
     *
     */
    public function testAdd()
    {
        $this->assertCount(0, $this->object->getAll());
        $this->object->add(m::mock('NullDev\Nemesis\Target\TestMetaData'));
        $this->assertCount(1, $this->object->getAll());
    }

    /**
     *
     */
    public function testGetAll()
    {
        $result = $this->object->getAll();

        $this->assertCount(0, $result);
    }
}
