<?php
namespace NullDev\Nemesis\Tests\Unit\Source;

use NullDev\Nemesis\Source\ClassMetaDataFactory;
use Mockery as m;

/**
 *
 */
class ClassMetaDataFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ClassMetaDataFactory
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new ClassMetaDataFactory();
    }

    /**
     *
     */
    public function testCreate()
    {
        $result = $this->object->create();
        $this->assertInstanceOf('NullDev\Nemesis\Source\ClassMetaData', $result);
    }
}
