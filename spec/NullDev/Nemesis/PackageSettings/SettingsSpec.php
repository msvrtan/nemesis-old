<?php

namespace spec\NullDev\Nemesis\PackageSettings;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SettingsSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\PackageSettings\Settings');
    }

    /**
     * @param NullDev\Nemesis\PackageSettings\SourceMetaData $settings
     */
    public function it_should_hold_package_source_code_settings_data($settings)
    {
        $this->setSourceCode($settings);
        $this->getSourceCode()->shouldReturn($settings);
    }

    /**
     * @param NullDev\Nemesis\PackageSettings\TestMetaData $settings
     */
    public function it_should_hold_package_unit_test_settings_data($settings)
    {
        $this->setUnitTest($settings);
        $this->getUnitTest()->shouldReturn($settings);
    }

    /**
     * @param NullDev\Nemesis\PackageSettings\TestMetaData $settings
     */
    public function it_should_hold_package_integration_test_settings_data($settings)
    {
        $this->setIntegrationTest($settings);
        $this->getIntegrationTest()->shouldReturn($settings);
    }

    /**
     * @param NullDev\Nemesis\PackageSettings\TestMetaData $settings
     */
    public function it_should_hold_package_functional_test_settings_data($settings)
    {
        $this->setFunctionalTest($settings);
        $this->getFunctionalTest()->shouldReturn($settings);
    }
}
