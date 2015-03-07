<?php
namespace NullDev\Nemesis\Tests\Unit\PackageSettings;

use NullDev\Nemesis\PackageSettings\SourceMetaData;
use Mockery as m;

/**
 *
 */
class SourceMetaDataTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SourceMetaData
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new SourceMetaData();
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
     * Auto generated get method using TeeGee.
     */
    public function testGetExcludeFolders()
    {
        $this->assertEquals(
            array(),
            $this->object->getExcludeFolders()
        );
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetExcludeFolders()
    {
        $excludeFolders = 'excludeFolders';
        $this->object->setExcludeFolders($excludeFolders);
        $this->assertEquals($excludeFolders, $this->object->getExcludeFolders());
    }

    /**
     *
     */
    public function testAddExcludeFolders()
    {
        $this->assertEquals([], $this->object->getExcludeFolders());
        $this->object->addExcludeFolders('folderName');
        $this->assertEquals(['folderName'], $this->object->getExcludeFolders());
    }
}
