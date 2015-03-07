<?php
namespace NullDev\Nemesis\Tests\Unit\Action;

use NullDev\Nemesis\Action\PackageTestGeneratorFactory;
use Mockery as m;

/**
 *
 */
class PackageTestGeneratorFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testCreate()
    {
        $mockSorceCollectionGenerator = m::mock('NullDev\Nemesis\Source\ClassMetaDataCollectionGenerator');
        $mockTestCollectionGenerator  = m::mock('NullDev\Nemesis\Target\TestMetaDataCollectionGenerator');

        $obj = new PackageTestGeneratorFactory($mockSorceCollectionGenerator, $mockTestCollectionGenerator);

        $mockSettings = m::mock('NullDev\Nemesis\PackageSettings\Settings');
        $result       = $obj->create($mockSettings);

        $this->assertInstanceOf('NullDev\Nemesis\Action\PackageTestGenerator', $result);
    }
}
