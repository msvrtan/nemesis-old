<?php
namespace NullDev\Nemesis\PackageSettingsProviders;

interface PackageSettingsProviderInterface
{
    /**
     * @param string $rootPath Path to the root of package (in this case Symfony2Bundle).
     *
     * @return Settings
     */
    public function generate($rootPath);
}
