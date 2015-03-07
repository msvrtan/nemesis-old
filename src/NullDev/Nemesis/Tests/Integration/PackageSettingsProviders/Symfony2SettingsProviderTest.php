<?php
namespace NullDev\Nemesis\Tests\Integration\PackageSettingsProviders;

use NullDev\Nemesis\PackageSettings\SettingsFactory;
use NullDev\Nemesis\PackageSettings\SourceMetaDataFactory;
use NullDev\Nemesis\PackageSettings\TestMetaDataFactory;
use NullDev\Nemesis\PackageSettingsProviders\Symfony2SettingsProvider;
use stdClass;
use NullDev\Nemesis\Tests\Integration\IntegrationTestBase;

/**
 *
 */
class Symfony2SettingsProviderTest extends IntegrationTestBase
{
    /**
     * @var Symfony2SettingsProvider
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $settingsFactory       = new SettingsFactory();
        $sourceMetaDataFactory = new SourceMetaDataFactory();
        $testMetaDataFactory   = new TestMetaDataFactory();

        $this->object = new Symfony2SettingsProvider($settingsFactory, $sourceMetaDataFactory, $testMetaDataFactory);
    }

    /**
     *
     */
    public function testGenerate()
    {
        $this->markTestIncomplete('TODO');
    }

    /**
     *
     */
    public function testGenerateUnitTestSettings()
    {
        $this->markTestIncomplete('TODO');
    }

    /**
     *
     */
    public function testGenerateIntegrationTestSettings()
    {
        $this->markTestIncomplete('TODO');
    }

    /**
     *
     */
    public function testGenerateFunctionalTestSettings()
    {
        $this->markTestIncomplete('TODO');
    }

    /**
     *
     */
    public function testGenerateTestSettings()
    {
        $this->markTestIncomplete('TODO');
    }

    /**
     *
     */
    public function testCalculateRootNamespaceFromRootPath()
    {
        $this->markTestIncomplete('TODO');
    }
}
