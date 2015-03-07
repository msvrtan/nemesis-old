<?php
namespace NullDev\Nemesis\Tests\Unit\Command;

use NullDev\Nemesis\Command\GenerateSf2BundleTestsCommand;
use Mockery as m;

/**
 *
 */
class GenerateSf2BundleTestsCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testRun()
    {
        $mockSettingsProvider = m::mock('NullDev\Nemesis\PackageSettingsProviders\Symfony2SettingsProvider');
        $mockActionFactory    = m::mock('NullDev\Nemesis\Action\PackageTestGeneratorFactory');

        $obj = new GenerateSf2BundleTestsCommand($mockSettingsProvider, $mockActionFactory);

        $mockSettings = m::mock('NullDev\Nemesis\PackageSettings\Settings');
        $mockAction   = m::mock();
        $mockAction
            ->shouldReceive('runAction')
            ->once();

        $mockSettingsProvider
            ->shouldReceive('generate')
            ->with('/path/to/application')
            ->once()
            ->andReturn($mockSettings);

        $mockActionFactory
            ->shouldReceive('create')
            ->with($mockSettings)
            ->once()
            ->andReturn($mockAction);

        $result = $obj->run('/path/to/application');

        $this->assertTrue($result);
    }
}
