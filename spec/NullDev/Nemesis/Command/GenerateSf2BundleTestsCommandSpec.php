<?php

namespace spec\NullDev\Nemesis\Command;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GenerateSf2BundleTestsCommandSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Command\GenerateSf2BundleTestsCommand');
    }

    /**
     * @param NullDev\Nemesis\PackageSettingsProviders\PackageSettingsProviderInterface $settingsProvider
     * @param NullDev\Nemesis\Action\PackageTestGeneratorFactory                        $actionFactory
     */
    public function let($settingsProvider, $actionFactory)
    {
        $this->beConstructedWith($settingsProvider, $actionFactory);
    }

    /**
     * @param NullDev\Nemesis\PackageSettingsProviders\PackageSettingsProviderInterface $settingsProvider
     * @param NullDev\Nemesis\Action\PackageTestGeneratorFactory                        $actionFactory
     * @param NullDev\Nemesis\PackageSettings\Settings                                  $settings
     * @param NullDev\Nemesis\Action\PackageTestGenerator                               $action
     */
    public function it_should_run_required_actions_to_generate_tests_on_given_package(
        $settingsProvider,
        $actionFactory,
        $settings,
        $action
    ) {
        $settingsProvider->generate('/lib/application/src/Vendor/PackageBundle')
            ->shouldBeCalled()
            ->willReturn($settings);

        $actionFactory->create($settings)
            ->shouldBeCalled()
            ->willReturn($action);

        $action->runAction()
            ->shouldBeCalled();

        $this->run('/lib/application/src/Vendor/PackageBundle')->shouldReturn(true);
    }
}
