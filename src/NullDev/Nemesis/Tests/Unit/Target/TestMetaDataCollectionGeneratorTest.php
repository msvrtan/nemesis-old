<?php
namespace NullDev\Nemesis\Tests\Unit\Target;

use NullDev\Nemesis\Target\TestMetaDataCollectionGenerator;
use Mockery as m;

/**
 *
 */
class TestMetaDataCollectionGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testGenerate()
    {
        $mockSourceMeta          = m::mock('NullDev\Nemesis\Source\ClassMetaData');
        $mockPackageSourceMeta   = m::mock('NullDev\Nemesis\PackageSettings\SourceMetaData');
        $mockPackageUnitTestMeta = m::mock('NullDev\Nemesis\PackageSettings\TestMetaData');
        $mockTestMeta            = m::mock('NullDev\Nemesis\Target\TestMetaData');

        $mockCollection = m::mock();
        $mockCollection
            ->shouldReceive('add')->with($mockTestMeta)->once();

        $mockCollectionFactory = m::mock('NullDev\Nemesis\Target\TestMetaDataCollectionFactory');
        $mockCollectionFactory
            ->shouldReceive('create')->once()->andReturn($mockCollection);

        $mockGenerator = m::mock('NullDev\Nemesis\Target\TestMetaDataGenerator');
        $mockGenerator
            ->shouldReceive('generate')
            ->with($mockPackageSourceMeta, $mockPackageUnitTestMeta, $mockSourceMeta)
            ->once()
            ->andReturn($mockTestMeta);

        $obj = new TestMetaDataCollectionGenerator($mockCollectionFactory, $mockGenerator);

        //
        $mockPackageSettings = m::mock('NullDev\Nemesis\PackageSettings\Settings');
        $mockPackageSettings
            ->shouldReceive('getSourceCode')->once()->andReturn($mockPackageSourceMeta);
        $mockPackageSettings
            ->shouldReceive('getUnitTest')->once()->andReturn($mockPackageUnitTestMeta);

        $mockSourceCollection = m::mock('NullDev\Nemesis\Source\ClassMetaDataCollection');
        $mockSourceCollection
            ->shouldReceive('getAll')->once()->andReturn([$mockSourceMeta]);

        $result = $obj->generate($mockPackageSettings, $mockSourceCollection);

        $this->assertNotNull($result);
    }
}
