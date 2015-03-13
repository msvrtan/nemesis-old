<?php
namespace NullDev\Nemesis\Tests\Unit\PackageSettingsProviders;

use NullDev\Nemesis\PackageSettingsProviders\Symfony2SettingsProvider;
use Mockery as m;

/**
 *
 */
class Symfony2SettingsProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers NullDev\Nemesis\PackageSettingsProviders\Symfony2SettingsProvider::generate
     */
    public function testGenerate()
    {
        $mockSettingsFactory       = m::mock('NullDev\Nemesis\PackageSettings\SettingsFactory');
        $mockSourceMetaDataFactory = m::mock('NullDev\Nemesis\PackageSettings\SourceMetaDataFactory');
        $mockTestMetaDataFactory   = m::mock('NullDev\Nemesis\PackageSettings\TestMetaDataFactory');

        $obj = new Symfony2SettingsProvider($mockSettingsFactory, $mockSourceMetaDataFactory, $mockTestMetaDataFactory);

        $mockSourceMetaData = m::mock('NullDev\Nemesis\PackageSettings\SourceMetaData');
        $mockSourceMetaData
            ->shouldReceive('setRootPath')
            ->with('/path/application/src/Vendor/SomeBundle')
            ->once();
        $mockSourceMetaData
            ->shouldReceive('getRootPath')
            ->once()
            ->andReturn('/path/application/src/Vendor/SomeBundle');
        $mockSourceMetaData
            ->shouldReceive('setRootNamespace')
            ->with('Vendor\SomeBundle')
            ->once();
        $mockSourceMetaData
            ->shouldReceive('getRootNamespace')
            ->once()
            ->andReturn('Vendor\SomeBundle');

        $mockUnitTestMetaData = m::mock('NullDev\Nemesis\PackageSettings\TestMetaData');
        $mockUnitTestMetaData
            ->shouldReceive('setRootPath')
            ->with('/path/application/src/Vendor/SomeBundle/Tests/Unit')
            ->once();
        $mockUnitTestMetaData
            ->shouldReceive('setRootNamespace')
            ->with('Vendor\SomeBundle\Tests\Unit')
            ->once();
        $mockUnitTestMetaData
            ->shouldReceive('enable')
            ->once();

        $mockIntTestMetaData = m::mock('NullDev\Nemesis\PackageSettings\TestMetaData');
        $mockIntTestMetaData
            ->shouldReceive('setRootPath')
            ->with('/path/application/src/Vendor/SomeBundle/Tests/Integration')
            ->once();
        $mockIntTestMetaData
            ->shouldReceive('setRootNamespace')
            ->with('Vendor\SomeBundle\Tests\Integration')
            ->once();
        $mockIntTestMetaData
            ->shouldReceive('disable')
            ->once();

        $mockFuncTestMetaData = m::mock('NullDev\Nemesis\PackageSettings\TestMetaData');
        $mockFuncTestMetaData
            ->shouldReceive('setRootPath')
            ->with('/path/application/src/Vendor/SomeBundle/Tests/Functional')
            ->once();
        $mockFuncTestMetaData
            ->shouldReceive('setRootNamespace')
            ->with('Vendor\SomeBundle\Tests\Functional')
            ->once();
        $mockFuncTestMetaData
            ->shouldReceive('disable')
            ->once();

        $mockSettings = m::mock('NullDev\Nemesis\PackageSettings\Settings');
        $mockSettings->shouldReceive('setSourceCode')->with($mockSourceMetaData)->once();
        $mockSettings->shouldReceive('setUnitTest')->with($mockUnitTestMetaData)->once();
        $mockSettings->shouldReceive('setIntegrationTest')->with($mockIntTestMetaData)->once();
        $mockSettings->shouldReceive('setFunctionalTest')->with($mockFuncTestMetaData)->once();

        $mockSettingsFactory
            ->shouldReceive('create')
            ->once()
            ->andReturn($mockSettings);

        $mockSourceMetaDataFactory
            ->shouldReceive('create')
            ->once()
            ->andReturn($mockSourceMetaData);

        $mockTestMetaDataFactory
            ->shouldReceive('create')
            ->times(3)
            ->andReturn($mockUnitTestMetaData, $mockIntTestMetaData, $mockFuncTestMetaData);

        //
        $result = $obj->generate('/path/application/src/Vendor/SomeBundle');

        $this->assertNotNull($result);
    }

    /**
     * @covers NullDev\Nemesis\PackageSettingsProviders\Symfony2SettingsProvider::generate
     */
    public function testGenerateWithTrailingSlash()
    {
        $mockSettingsFactory       = m::mock('NullDev\Nemesis\PackageSettings\SettingsFactory');
        $mockSourceMetaDataFactory = m::mock('NullDev\Nemesis\PackageSettings\SourceMetaDataFactory');
        $mockTestMetaDataFactory   = m::mock('NullDev\Nemesis\PackageSettings\TestMetaDataFactory');

        $obj = new Symfony2SettingsProvider($mockSettingsFactory, $mockSourceMetaDataFactory, $mockTestMetaDataFactory);

        $mockSourceMetaData = m::mock('NullDev\Nemesis\PackageSettings\SourceMetaData');
        $mockSourceMetaData
            ->shouldReceive('setRootPath')
            ->with('/path/application/src/Vendor/SomeBundle')
            ->once();
        $mockSourceMetaData
            ->shouldReceive('getRootPath')
            ->once()
            ->andReturn('/path/application/src/Vendor/SomeBundle');
        $mockSourceMetaData
            ->shouldReceive('setRootNamespace')
            ->with('Vendor\SomeBundle')
            ->once();
        $mockSourceMetaData
            ->shouldReceive('getRootNamespace')
            ->once()
            ->andReturn('Vendor\SomeBundle');

        $mockUnitTestMetaData = m::mock('NullDev\Nemesis\PackageSettings\TestMetaData');
        $mockUnitTestMetaData
            ->shouldReceive('setRootPath')
            ->with('/path/application/src/Vendor/SomeBundle/Tests/Unit')
            ->once();
        $mockUnitTestMetaData
            ->shouldReceive('setRootNamespace')
            ->with('Vendor\SomeBundle\Tests\Unit')
            ->once();
        $mockUnitTestMetaData
            ->shouldReceive('enable')
            ->once();

        $mockIntTestMetaData = m::mock('NullDev\Nemesis\PackageSettings\TestMetaData');
        $mockIntTestMetaData
            ->shouldReceive('setRootPath')
            ->with('/path/application/src/Vendor/SomeBundle/Tests/Integration')
            ->once();
        $mockIntTestMetaData
            ->shouldReceive('setRootNamespace')
            ->with('Vendor\SomeBundle\Tests\Integration')
            ->once();
        $mockIntTestMetaData
            ->shouldReceive('disable')
            ->once();

        $mockFuncTestMetaData = m::mock('NullDev\Nemesis\PackageSettings\TestMetaData');
        $mockFuncTestMetaData
            ->shouldReceive('setRootPath')
            ->with('/path/application/src/Vendor/SomeBundle/Tests/Functional')
            ->once();
        $mockFuncTestMetaData
            ->shouldReceive('setRootNamespace')
            ->with('Vendor\SomeBundle\Tests\Functional')
            ->once();
        $mockFuncTestMetaData
            ->shouldReceive('disable')
            ->once();

        $mockSettings = m::mock('NullDev\Nemesis\PackageSettings\Settings');
        $mockSettings->shouldReceive('setSourceCode')->with($mockSourceMetaData)->once();
        $mockSettings->shouldReceive('setUnitTest')->with($mockUnitTestMetaData)->once();
        $mockSettings->shouldReceive('setIntegrationTest')->with($mockIntTestMetaData)->once();
        $mockSettings->shouldReceive('setFunctionalTest')->with($mockFuncTestMetaData)->once();

        $mockSettingsFactory
            ->shouldReceive('create')
            ->once()
            ->andReturn($mockSettings);

        $mockSourceMetaDataFactory
            ->shouldReceive('create')
            ->once()
            ->andReturn($mockSourceMetaData);

        $mockTestMetaDataFactory
            ->shouldReceive('create')
            ->times(3)
            ->andReturn($mockUnitTestMetaData, $mockIntTestMetaData, $mockFuncTestMetaData);

        //
        $result = $obj->generate('/path/application/src/Vendor/SomeBundle/');

        $this->assertNotNull($result);
    }

    /**
     *
     */
    public function testGenerateUnitTestSettings()
    {
        $mockSettingsFactory       = m::mock('NullDev\Nemesis\PackageSettings\SettingsFactory');
        $mockSourceMetaDataFactory = m::mock('NullDev\Nemesis\PackageSettings\SourceMetaDataFactory');
        $mockTestMetaDataFactory   = m::mock('NullDev\Nemesis\PackageSettings\TestMetaDataFactory');

        $obj = new Symfony2SettingsProvider($mockSettingsFactory, $mockSourceMetaDataFactory, $mockTestMetaDataFactory);

        $mockSourceMetaData = m::mock('NullDev\Nemesis\PackageSettings\SourceMetaData');
        $mockSourceMetaData
            ->shouldReceive('getRootPath')
            ->once()
            ->andReturn('/path/application/src/Vendor/SomeBundle');
        $mockSourceMetaData
            ->shouldReceive('getRootNamespace')
            ->once()
            ->andReturn('Vendor\SomeBundle');

        $mockTestMetaData = m::mock('NullDev\Nemesis\PackageSettings\TestMetaData');
        $mockTestMetaData
            ->shouldReceive('setRootPath')
            ->with('/path/application/src/Vendor/SomeBundle/Tests/Unit')
            ->once();
        $mockTestMetaData
            ->shouldReceive('setRootNamespace')
            ->with('Vendor\SomeBundle\Tests\Unit')
            ->once();
        $mockTestMetaData
            ->shouldReceive('enable')
            ->once();

        $mockTestMetaDataFactory
            ->shouldReceive('create')
            ->times(3)
            ->andReturn($mockTestMetaData);

        $result = $obj->generateUnitTestSettings($mockSourceMetaData);

        $this->assertEquals($mockTestMetaData, $result);
    }

    /**
     *
     */
    public function testGenerateIntegrationTestSettings()
    {
        $mockSettingsFactory       = m::mock('NullDev\Nemesis\PackageSettings\SettingsFactory');
        $mockSourceMetaDataFactory = m::mock('NullDev\Nemesis\PackageSettings\SourceMetaDataFactory');
        $mockTestMetaDataFactory   = m::mock('NullDev\Nemesis\PackageSettings\TestMetaDataFactory');

        $obj = new Symfony2SettingsProvider($mockSettingsFactory, $mockSourceMetaDataFactory, $mockTestMetaDataFactory);

        $mockSourceMetaData = m::mock('NullDev\Nemesis\PackageSettings\SourceMetaData');
        $mockSourceMetaData
            ->shouldReceive('getRootPath')
            ->once()
            ->andReturn('/path/application/src/Vendor/SomeBundle');
        $mockSourceMetaData
            ->shouldReceive('getRootNamespace')
            ->once()
            ->andReturn('Vendor\SomeBundle');

        $mockTestMetaData = m::mock('NullDev\Nemesis\PackageSettings\TestMetaData');
        $mockTestMetaData
            ->shouldReceive('setRootPath')
            ->with('/path/application/src/Vendor/SomeBundle/Tests/Integration')
            ->once();
        $mockTestMetaData
            ->shouldReceive('setRootNamespace')
            ->with('Vendor\SomeBundle\Tests\Integration')
            ->once();
        $mockTestMetaData
            ->shouldReceive('disable')
            ->once();

        $mockTestMetaDataFactory
            ->shouldReceive('create')
            ->times(3)
            ->andReturn($mockTestMetaData);

        $result = $obj->generateIntegrationTestSettings($mockSourceMetaData);

        $this->assertEquals($mockTestMetaData, $result);
    }

    /**
     *
     */
    public function testGenerateFunctionalTestSettings()
    {
        $mockSettingsFactory       = m::mock('NullDev\Nemesis\PackageSettings\SettingsFactory');
        $mockSourceMetaDataFactory = m::mock('NullDev\Nemesis\PackageSettings\SourceMetaDataFactory');
        $mockTestMetaDataFactory   = m::mock('NullDev\Nemesis\PackageSettings\TestMetaDataFactory');

        $obj = new Symfony2SettingsProvider($mockSettingsFactory, $mockSourceMetaDataFactory, $mockTestMetaDataFactory);

        $mockSourceMetaData = m::mock('NullDev\Nemesis\PackageSettings\SourceMetaData');
        $mockSourceMetaData
            ->shouldReceive('getRootPath')
            ->once()
            ->andReturn('/path/application/src/Vendor/SomeBundle');
        $mockSourceMetaData
            ->shouldReceive('getRootNamespace')
            ->once()
            ->andReturn('Vendor\SomeBundle');

        $mockTestMetaData = m::mock('NullDev\Nemesis\PackageSettings\TestMetaData');
        $mockTestMetaData
            ->shouldReceive('setRootPath')
            ->with('/path/application/src/Vendor/SomeBundle/Tests/Functional')
            ->once();
        $mockTestMetaData
            ->shouldReceive('setRootNamespace')
            ->with('Vendor\SomeBundle\Tests\Functional')
            ->once();
        $mockTestMetaData
            ->shouldReceive('disable')
            ->once();

        $mockTestMetaDataFactory
            ->shouldReceive('create')
            ->times(3)
            ->andReturn($mockTestMetaData);

        $result = $obj->generateFunctionalTestSettings($mockSourceMetaData);

        $this->assertEquals($mockTestMetaData, $result);
    }

    /**
     *
     */
    public function testGenerateTestSettings()
    {
        $mockSettingsFactory       = m::mock('NullDev\Nemesis\PackageSettings\SettingsFactory');
        $mockSourceMetaDataFactory = m::mock('NullDev\Nemesis\PackageSettings\SourceMetaDataFactory');
        $mockTestMetaDataFactory   = m::mock('NullDev\Nemesis\PackageSettings\TestMetaDataFactory');

        $obj = new Symfony2SettingsProvider($mockSettingsFactory, $mockSourceMetaDataFactory, $mockTestMetaDataFactory);

        $mockSourceMetaData = m::mock('NullDev\Nemesis\PackageSettings\SourceMetaData');
        $mockSourceMetaData
            ->shouldReceive('getRootPath')
            ->once()
            ->andReturn('/path/application/src/Vendor/SomeBundle');
        $mockSourceMetaData
            ->shouldReceive('getRootNamespace')
            ->once()
            ->andReturn('Vendor\SomeBundle');

        $mockTestMetaData = m::mock('NullDev\Nemesis\PackageSettings\TestMetaData');
        $mockTestMetaData
            ->shouldReceive('setRootPath')
            ->with('/path/application/src/Vendor/SomeBundle/Tests/Type')
            ->once();
        $mockTestMetaData
            ->shouldReceive('setRootNamespace')
            ->with('Vendor\SomeBundle\Tests\Type')
            ->once();

        $mockTestMetaDataFactory
            ->shouldReceive('create')
            ->times(3)
            ->andReturn($mockTestMetaData);

        $result = $obj->generateTestSettings($mockSourceMetaData, 'Type');

        $this->assertEquals($mockTestMetaData, $result);
    }

    /**
     * @dataProvider dataCalculateRootNamespaceFromRootPath
     *
     * @param $rootPath
     *
     * @throws \Exception
     */
    public function testCalculateRootNamespaceFromRootPath($rootPath)
    {
        $mockSettingsFactory       = m::mock('NullDev\Nemesis\PackageSettings\SettingsFactory');
        $mockSourceMetaDataFactory = m::mock('NullDev\Nemesis\PackageSettings\SourceMetaDataFactory');
        $mockTestMetaDataFactory   = m::mock('NullDev\Nemesis\PackageSettings\TestMetaDataFactory');

        $obj = new Symfony2SettingsProvider($mockSettingsFactory, $mockSourceMetaDataFactory, $mockTestMetaDataFactory);

        $result = $obj->calculateRootNamespaceFromRootPath($rootPath);

        $this->assertEquals('Vendor\SomeBundle', $result);
    }

    public function dataCalculateRootNamespaceFromRootPath()
    {
        return [
            ['/path/application/src/Vendor/SomeBundle'],
            ['/path/application/src/Vendor/SomeBundle/'],
            ['/path/src/application/src/Vendor/SomeBundle'],
        ];
    }

    /**
     *
     */
    public function testCalculateRootNamespaceFromRootPathNoSrcFound()
    {
        $mockSettingsFactory       = m::mock('NullDev\Nemesis\PackageSettings\SettingsFactory');
        $mockSourceMetaDataFactory = m::mock('NullDev\Nemesis\PackageSettings\SourceMetaDataFactory');
        $mockTestMetaDataFactory   = m::mock('NullDev\Nemesis\PackageSettings\TestMetaDataFactory');

        $obj = new Symfony2SettingsProvider($mockSettingsFactory, $mockSourceMetaDataFactory, $mockTestMetaDataFactory);

        $this->setExpectedException('Exception');
        $result = $obj->calculateRootNamespaceFromRootPath('/path/Vendor/SomeBundle');

        $this->assertEquals('Vendor\SomeBundle', $result);
    }
}
