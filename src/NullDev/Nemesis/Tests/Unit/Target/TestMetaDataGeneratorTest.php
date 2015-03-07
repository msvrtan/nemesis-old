<?php
namespace NullDev\Nemesis\Tests\Unit\Target;

use NullDev\Nemesis\Target\TestMetaDataGenerator;
use Mockery as m;

/**
 *
 */
class TestMetaDataGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testGenerate()
    {
        $mockTestMeta = m::mock();
        $mockTestMeta
            ->shouldReceive('setClassName')->with('SomeClassTest')->once();
        $mockTestMeta
            ->shouldReceive('setFullyQualifiedClassName')
            ->with('Vendor\SomeBundle\Tests\Unit\Namespace\SomeClassTest')
            ->once();
        $mockTestMeta
            ->shouldReceive('setFilePath')
            ->with('/var/application/src/Vendor/SomeBundle/Tests/Unit/Namespace/SomeClassTest.php')
            ->once();

        $mockTestMetaFactory = m::mock('NullDev\Nemesis\Target\TestMetaDataFactory');
        $mockTestMetaFactory
            ->shouldReceive('create')->once()->andReturn($mockTestMeta);

        $obj = new TestMetaDataGenerator($mockTestMetaFactory);

        //
        $mockPackageSourceMeta = m::mock('NullDev\Nemesis\PackageSettings\SourceMetaData');
        $mockPackageSourceMeta
            ->shouldReceive('getRootNamespace')->once()->andReturn('Vendor\SomeBundle');
        $mockPackageSourceMeta
            ->shouldReceive('getRootPath')->once()->andReturn('/var/application/src/Vendor/SomeBundle');

        $mockPackageTestMeta = m::mock('NullDev\Nemesis\PackageSettings\TestMetaData');
        $mockPackageTestMeta
            ->shouldReceive('getRootNamespace')->once()->andReturn('Vendor\SomeBundle\Tests\Unit');
        $mockPackageTestMeta
            ->shouldReceive('getRootPath')->once()->andReturn('/var/application/src/Vendor/SomeBundle/Tests/Unit');

        $mockSourceMeta = m::mock('NullDev\Nemesis\Source\ClassMetaData');
        $mockSourceMeta
            ->shouldReceive('getClassName')->once()->andReturn('SomeClass');
        $mockSourceMeta
            ->shouldReceive('getFullyQualifiedClassName')->once()->andReturn('Vendor\SomeBundle\Namespace\SomeClass');
        $mockSourceMeta
            ->shouldReceive('getFilePath')->once()->andReturn(
                '/var/application/src/Vendor/SomeBundle/Namespace/SomeClass.php'
            );

        $result = $obj->generate($mockPackageSourceMeta, $mockPackageTestMeta, $mockSourceMeta);

        $this->assertEquals($mockTestMeta, $result);
    }
}
