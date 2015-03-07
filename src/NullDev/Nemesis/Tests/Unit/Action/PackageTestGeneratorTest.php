<?php
namespace NullDev\Nemesis\Tests\Unit\Action;

use NullDev\Nemesis\Action\PackageTestGenerator;
use Mockery as m;

/**
 *
 */
class PackageTestGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testRunAction()
    {
        $mockSourceCollectionGenerator = m::mock('NullDev\Nemesis\Source\ClassMetaDataCollectionGenerator');
        $mockTestCollectionGenerator   = m::mock('NullDev\Nemesis\Target\TestMetaDataCollectionGenerator');
        $mockSettings                  = m::mock('NullDev\Nemesis\PackageSettings\Settings');

        $obj = new PackageTestGenerator($mockSourceCollectionGenerator, $mockTestCollectionGenerator, $mockSettings);

        $mockSourceCollection = m::mock('NullDev\Nemesis\Source\ClassMetaDataCollection');
        $mockTestCollection   = m::mock('NullDev\Nemesis\Target\TestMetaDataCollection');

        $mockSourceCollectionGenerator
            ->shouldReceive('generate')
            ->with($mockSettings)
            ->once()
            ->andReturn($mockSourceCollection);

        $mockTestCollectionGenerator
            ->shouldReceive('generate')
            ->with($mockSettings, $mockSourceCollection)
            ->once()
            ->andReturn($mockTestCollection);

        $result = $obj->runAction();

        $this->assertEquals($mockTestCollection, $result);
    }

    /**
     *
     */
    public function testGenerateTestCollection()
    {
        $mockSourceCollectionGenerator = m::mock('NullDev\Nemesis\Source\ClassMetaDataCollectionGenerator');
        $mockTestCollectionGenerator   = m::mock('NullDev\Nemesis\Target\TestMetaDataCollectionGenerator');
        $mockSettings                  = m::mock('NullDev\Nemesis\PackageSettings\Settings');

        $obj = new PackageTestGenerator($mockSourceCollectionGenerator, $mockTestCollectionGenerator, $mockSettings);

        $mockSourceCollection = m::mock('NullDev\Nemesis\Source\ClassMetaDataCollection');
        $mockTestCollection   = m::mock('NullDev\Nemesis\Target\TestMetaDataCollection');

        $mockSourceCollectionGenerator
            ->shouldReceive('generate')
            ->with($mockSettings)
            ->once()
            ->andReturn($mockSourceCollection);

        $mockTestCollectionGenerator
            ->shouldReceive('generate')
            ->with($mockSettings, $mockSourceCollection)
            ->once()
            ->andReturn($mockTestCollection);

        $result = $obj->generateTestCollection();

        $this->assertEquals($mockTestCollection, $result);
    }
}
