<?php
namespace NullDev\Nemesis\Tests\Unit\PackageSettings;

use NullDev\Nemesis\PackageSettings\SourceMetaDataFactory;
use Mockery as m;

/**
 *
 */
class SourceMetaDataFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SourceMetaDataFactory
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new SourceMetaDataFactory();
    }

    /**
     *
     */
    public function testCreate()
    {
        $result = $this->object->create();

        $this->assertInstanceOf('NullDev\Nemesis\PackageSettings\SourceMetaData', $result);
    }
}
