<?php
namespace NullDev\Nemesis\Tests\Unit\PackageSettings;

use NullDev\Nemesis\PackageSettings\SettingsFactory;
use Mockery as m;

/**
 *
 */
class SettingsFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SettingsFactory
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new SettingsFactory();
    }

    /**
     *
     */
    public function testCreate()
    {
        $result = $this->object->create();

        $this->assertInstanceOf('NullDev\Nemesis\PackageSettings\Settings', $result);
    }
}
