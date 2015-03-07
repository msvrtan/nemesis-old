<?php
namespace NullDev\Nemesis\Tests\Unit\Source;

use NullDev\Nemesis\Source\ClassMetaData;
use Mockery as m;

/**
 *
 */
class ClassMetaDataTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ClassMetaData
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new ClassMetaData();
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetFilePath()
    {
        $this->assertEquals(null, $this->object->getFilePath());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetFilePath()
    {
        $filePath = 'filePath';
        $this->object->setFilePath($filePath);
        $this->assertEquals($filePath, $this->object->getFilePath());
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetClassName()
    {
        $this->assertEquals(null, $this->object->getClassName());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetClassName()
    {
        $className = 'className';
        $this->object->setClassName($className);
        $this->assertEquals($className, $this->object->getClassName());
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetFullyQualifiedClassName()
    {
        $this->assertEquals(null, $this->object->getFullyQualifiedClassName());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetFullyQualifiedClassName()
    {
        $fullyQualifiedClassName = 'fullyQualifiedClassName';
        $this->object->setFullyQualifiedClassName($fullyQualifiedClassName);
        $this->assertEquals($fullyQualifiedClassName, $this->object->getFullyQualifiedClassName());
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetReflection()
    {
        $this->assertEquals(null, $this->object->getReflection());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetReflection()
    {
        $reflection = m::mock('ReflectionClass');
        $this->object->setReflection($reflection);
        $this->assertEquals($reflection, $this->object->getReflection());
    }
}
