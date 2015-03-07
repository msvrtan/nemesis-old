<?php
namespace NullDev\Nemesis\Tests\Unit\Source;

use NullDev\Nemesis\Source\ClassMetaDataCollectionGenerator;
use Mockery as m;

/**
 *
 */
class ClassMetaDataCollectionGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testGenerate()
    {
        $mockFactory             = m::mock('NullDev\Nemesis\Source\ClassMetaDataCollectionFactory');
        $mockFinder              = m::mock('Symfony\Component\Finder\Finder');
        $mockSourceMetaGenerator = m::mock('NullDev\Nemesis\Source\ClassMetaDataGenerator');

        $obj = new ClassMetaDataCollectionGenerator($mockFactory, $mockFinder, $mockSourceMetaGenerator);

        $mockSourceMeta = m::mock('NullDev\Nemesis\Source\ClassMetaData');

        $mockFilePath1  = '/path/class.php';
        $mockFiles = [$mockFilePath1];

        $mockFinder
            ->shouldReceive('files')->once()->andReturn($mockFinder);
        $mockFinder
            ->shouldReceive('name')->with('*.php')->once()->andReturn($mockFinder);
        $mockFinder
            ->shouldReceive('in')->with('/path')->once()->andReturn($mockFinder);
        $mockFinder
            ->shouldReceive('exclude')->with(['excluded-folder-1'])->once()->andReturn($mockFiles);

        $mockSourceMetaGenerator
            ->shouldReceive('generate')->with($mockFilePath1)->once()->andReturn($mockSourceMeta);

        $mockSettings = m::mock('NullDev\Nemesis\PackageSettings\Settings');
        $mockSettings
            ->shouldReceive('getSourceCode->getRootPath')->once()->andReturn('/path');
        $mockSettings
            ->shouldReceive('getSourceCode->getExcludeFolders')->once()->andReturn(['excluded-folder-1']);

        $mockCollection = m::mock('NullDev\Nemesis\Source\ClassMetaDataCollection');
        $mockCollection
            ->shouldReceive('add')->with($mockSourceMeta)->once();

        $mockFactory
            ->shouldReceive('create')->once()->andReturn($mockCollection);

        $result = $obj->generate($mockSettings);

        $this->assertEquals($mockCollection, $result);
    }
}
