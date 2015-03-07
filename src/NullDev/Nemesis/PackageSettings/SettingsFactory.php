<?php

namespace NullDev\Nemesis\PackageSettings;

use NullDev\Nemesis\PackageSettings\Settings;

class SettingsFactory
{
    /**
     * @return Settings
     */
    public function create()
    {
        return new Settings();
    }
}
