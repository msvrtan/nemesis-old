<?php
namespace NullDev\Nemesis\Tests\Unit\Source;

use NullDev\Nemesis\Source\ClassMetaDataCollection;
use Mockery as m;

/**
 *
 */
class ClassMetaDataCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ClassMetaDataCollection
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new ClassMetaDataCollection();
    }

    /**
     *
     */
    public function testAdd()
    {
        $this->assertCount(0, $this->object->getAll());
        $this->object->add(m::mock('NullDev\Nemesis\Source\ClassMetaData'));
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
