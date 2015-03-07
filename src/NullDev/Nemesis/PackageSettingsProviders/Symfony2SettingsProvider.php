<?php

namespace NullDev\Nemesis\PackageSettingsProviders;

use NullDev\Nemesis\PackageSettings\Settings;
use NullDev\Nemesis\PackageSettings\SourceMetaData;
use NullDev\Nemesis\PackageSettings\TestMetaData;
use NullDev\Nemesis\PackageSettings\SettingsFactory;
use NullDev\Nemesis\PackageSettings\SourceMetaDataFactory;
use NullDev\Nemesis\PackageSettings\TestMetaDataFactory;

/**
 * Class Symfony2SettingsProvider.
 *
 *
 * @TODO    : rewrite this class, testGenerate() shows how hard it is to mock all of this :(
 */
class Symfony2SettingsProvider implements PackageSettingsProviderInterface
{
    protected $settingsFactory;
    protected $sourceMetaDataFactory;
    protected $testMetaDataFactory;

    public function __construct(
        SettingsFactory $settingsFactory,
        SourceMetaDataFactory $sourceMetaDataFactory,
        TestMetaDataFactory $testMetaDataFactory
    ) {
        $this->settingsFactory       = $settingsFactory;
        $this->sourceMetaDataFactory = $sourceMetaDataFactory;
        $this->testMetaDataFactory   = $testMetaDataFactory;
    }

    /**
     * @param string $rootPath Path to the root of package (in this case Symfony2Bundle).
     *
     * @return Settings
     */
    public function generate($rootPath)
    {
        if (substr($rootPath, -1) === '/') {
            $rootPath = substr($rootPath, 0, -1);
        }

        $packageSettings = $this->settingsFactory->create();

        $sourceMeta = $this->sourceMetaDataFactory->create();

        $sourceMeta->setRootPath($rootPath);
        $sourceMeta->setRootNamespace($this->calculateRootNamespaceFromRootPath($rootPath));

        $packageSettings->setSourceCode($sourceMeta);
        $packageSettings->setUnitTest($this->generateUnitTestSettings($sourceMeta));
        $packageSettings->setIntegrationTest($this->generateIntegrationTestSettings($sourceMeta));
        $packageSettings->setFunctionalTest($this->generateFunctionalTestSettings($sourceMeta));

        return $packageSettings;
    }

    /**
     * @param SourceMetaData $sourceMeta
     *
     * @return TestMetaData
     */
    public function generateUnitTestSettings(SourceMetaData $sourceMeta)
    {
        $setting = $this->generateTestSettings($sourceMeta, 'Unit');
        $setting->enable();

        return $setting;
    }

    /**
     * @param SourceMetaData $sourceMeta
     *
     * @return TestMetaData
     */
    public function generateIntegrationTestSettings(SourceMetaData $sourceMeta)
    {
        $setting = $this->generateTestSettings($sourceMeta, 'Integration');
        $setting->disable();

        return $setting;
    }

    /**
     * @param SourceMetaData $sourceMeta
     *
     * @return TestMetaData
     */
    public function generateFunctionalTestSettings(SourceMetaData $sourceMeta)
    {
        $setting = $this->generateTestSettings($sourceMeta, 'Functional');
        $setting->disable();

        return $setting;
    }

    /**
     * @param SourceMetaData $sourceMeta
     * @param string         $testType
     *
     * @return TestMetaData
     */
    public function generateTestSettings(SourceMetaData $sourceMeta, $testType)
    {
        $testSettings = $this->testMetaDataFactory->create();

        $testSettings->setRootPath($sourceMeta->getRootPath().'/Tests/'.$testType);
        $testSettings->setRootNamespace($sourceMeta->getRootNamespace().'\\Tests\\'.$testType);

        return $testSettings;
    }

    /**
     * @param string $rootPath
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function calculateRootNamespaceFromRootPath($rootPath)
    {
        if (substr($rootPath, -1) === '/') {
            $rootPath = substr($rootPath, 0, -1);
        }

        //Locates last occurrence of 'src/' in given path.
        $regex = '/.*src\/(?<namespace>.*)$/';

        //Regex occurrence hasn't matched 'src/' in path.
        if (!preg_match($regex, $rootPath, $matches)) {
            throw new \Exception('Root namespace not recognizable in '.$rootPath);
        }

        //Replace '/' with namespace separator.
        $namespace = str_replace('/', '\\', $matches['namespace']);

        return $namespace;
    }
}
