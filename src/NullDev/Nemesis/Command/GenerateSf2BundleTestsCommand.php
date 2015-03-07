<?php

namespace NullDev\Nemesis\Command;

use NullDev\Nemesis\PackageSettingsProviders\PackageSettingsProviderInterface;
use NullDev\Nemesis\Action\PackageTestGeneratorFactory;

class GenerateSf2BundleTestsCommand
{
    protected $settingsProvider;
    protected $actionFactory;

    public function __construct(
        PackageSettingsProviderInterface $settingsProvider,
        PackageTestGeneratorFactory $actionFactory
    ) {
        $this->settingsProvider = $settingsProvider;
        $this->actionFactory    = $actionFactory;
    }

    /**
     * @param string $rootPath
     *
     * @return bool
     */
    public function run($rootPath)
    {
        $settings = $this->settingsProvider->generate($rootPath);

        $action = $this->actionFactory->create($settings);

        $action->runAction();

        return true;
    }
}
