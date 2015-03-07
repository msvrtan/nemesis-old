<?php
namespace NullDev\Nemesis\Tests\Unit\PackageSettings;

use NullDev\Nemesis\PackageSettings\Settings;
use Mockery as m;

/**
 *
 */
class SettingsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Settings
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new Settings();
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetSourceCode()
    {
        $this->assertEquals(null, $this->object->getSourceCode());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetSourceCode()
    {
        $sourceCode = m::mock('NullDev\Nemesis\PackageSettings\SourceMetaData');
        $this->object->setSourceCode($sourceCode);
        $this->assertEquals($sourceCode, $this->object->getSourceCode());
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetUnitTest()
    {
        $this->assertEquals(null, $this->object->getUnitTest());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetUnitTest()
    {
        $unitTest = m::mock('NullDev\Nemesis\PackageSettings\TestMetaData');
        $this->object->setUnitTest($unitTest);
        $this->assertEquals($unitTest, $this->object->getUnitTest());
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetIntegrationTest()
    {
        $this->assertEquals(null, $this->object->getIntegrationTest());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetIntegrationTest()
    {
        $integrationTest = m::mock('NullDev\Nemesis\PackageSettings\TestMetaData');
        $this->object->setIntegrationTest($integrationTest);
        $this->assertEquals($integrationTest, $this->object->getIntegrationTest());
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetFunctionalTest()
    {
        $this->assertEquals(null, $this->object->getFunctionalTest());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetFunctionalTest()
    {
        $functionalTest = m::mock('NullDev\Nemesis\PackageSettings\TestMetaData');
        $this->object->setFunctionalTest($functionalTest);
        $this->assertEquals($functionalTest, $this->object->getFunctionalTest());
    }
}
