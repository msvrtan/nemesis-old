<?php
namespace NullDev\Nemesis\Tests\Integration\Command;

use NullDev\Nemesis\Command\GenerateSf2BundleTestsCommand;
use stdClass;
use NullDev\Nemesis\Tests\Integration\IntegrationTestBase;

/**
 *
 */
class GenerateSf2BundleTestsCommandTest extends IntegrationTestBase
{
    /**
     * @var GenerateSf2BundleTestsCommand
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $settingsProvider = $this->getSymfony2SettingsProvider();
        $actionFactory    = $this->getPackageTestGeneratorFactory();

        $this->object = new GenerateSf2BundleTestsCommand($settingsProvider, $actionFactory);
    }

    /**
     *
     */
    public function testRun()
    {
        $this->markTestIncomplete('TODO');
    }
}
