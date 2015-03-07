<?php
namespace NullDev\Nemesis\Tests\Unit\PackageSettings;

use NullDev\Nemesis\PackageSettings\TestMetaData;
use Mockery as m;

/**
 *
 */
class TestMetaDataTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TestMetaData
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new TestMetaData();
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetRootPath()
    {
        $this->assertEquals(null, $this->object->getRootPath());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetRootPath()
    {
        $rootPath = 'rootPath';
        $this->object->setRootPath($rootPath);
        $this->assertEquals($rootPath, $this->object->getRootPath());
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetRootNamespace()
    {
        $this->assertEquals(null, $this->object->getRootNamespace());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetRootNamespace()
    {
        $rootNamespace = 'rootNamespace';
        $this->object->setRootNamespace($rootNamespace);
        $this->assertEquals($rootNamespace, $this->object->getRootNamespace());
    }

    /**
     *
     */
    public function testIsEnabled()
    {
        $this->assertTrue($this->object->isEnabled());
    }

    /**
     *
     */
    public function testDisable()
    {
        $this->object->disable();
        $this->assertFalse($this->object->isEnabled());
    }

    /**
     *
     */
    public function testEnable()
    {
        $this->object->disable();
        $this->assertFalse($this->object->isEnabled());
        $this->object->enable();
        $this->assertTrue($this->object->isEnabled());
    }
}
