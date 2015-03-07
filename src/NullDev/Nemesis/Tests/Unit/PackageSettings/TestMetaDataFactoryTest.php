<?php
namespace NullDev\Nemesis\Tests\Unit\PackageSettings;

use NullDev\Nemesis\PackageSettings\TestMetaDataFactory;
use Mockery as m;

/**
 *
 */
class TestMetaDataFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TestMetaDataFactory
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new TestMetaDataFactory();
    }

    /**
     *
     */
    public function testCreate()
    {
        $result = $this->object->create();

        $this->assertInstanceOf('NullDev\Nemesis\PackageSettings\TestMetaData', $result);
    }
}
