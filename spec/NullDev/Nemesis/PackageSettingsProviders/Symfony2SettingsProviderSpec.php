<?php

namespace spec\NullDev\Nemesis\PackageSettingsProviders;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Symfony2SettingsProviderSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\PackageSettingsProviders\Symfony2SettingsProvider');
        $this->shouldHaveType('NullDev\Nemesis\PackageSettingsProviders\PackageSettingsProviderInterface');
    }

    /**
     * @param NullDev\Nemesis\PackageSettings\SettingsFactory       $settingsFactory
     * @param NullDev\Nemesis\PackageSettings\SourceMetaDataFactory $sourceMetaFactory
     * @param NullDev\Nemesis\PackageSettings\TestMetaDataFactory   $testMetaFactory
     */
    public function let($settingsFactory, $sourceMetaFactory, $testMetaFactory)
    {
        $this->beConstructedWith($settingsFactory, $sourceMetaFactory, $testMetaFactory);
    }

    /**
     * @param NullDev\Nemesis\PackageSettings\SettingsFactory       $settingsFactory
     * @param NullDev\Nemesis\PackageSettings\SourceMetaDataFactory $sourceMetaFactory
     * @param NullDev\Nemesis\PackageSettings\TestMetaDataFactory   $testMetaFactory
     * @param NullDev\Nemesis\PackageSettings\Settings              $settings
     * @param NullDev\Nemesis\PackageSettings\SourceMetaData        $sourceMeta
     * @param NullDev\Nemesis\PackageSettings\TestMetaData          $unitTestMeta
     * @param NullDev\Nemesis\PackageSettings\TestMetaData          $intTestMeta
     * @param NullDev\Nemesis\PackageSettings\TestMetaData          $funcTestMeta
     */
    public function it_should_generate_package_meta_for_symfony2bundle(
        $settingsFactory,
        $sourceMetaFactory,
        $testMetaFactory,
        $settings,
        $sourceMeta,
        $unitTestMeta,
        $intTestMeta,
        $funcTestMeta
    ) {
        $settingsFactory->create()->shouldBeCalled()->willReturn($settings);
        $sourceMetaFactory->create()->shouldBeCalled()->willReturn($sourceMeta);
        $testMetaFactory->create()->shouldBeCalled()->willReturn($unitTestMeta);
        $testMetaFactory->create()->shouldBeCalled()->willReturn($intTestMeta);
        $testMetaFactory->create()->shouldBeCalled()->willReturn($funcTestMeta);

        $this->generate('/lib/application/src/Vendor/PackageBundle')->shouldReturn($settings);
    }

    /**
     * @param NullDev\Nemesis\PackageSettings\TestMetaDataFactory $testMetaFactory
     * @param NullDev\Nemesis\PackageSettings\SourceMetaData      $sourceMeta
     * @param NullDev\Nemesis\PackageSettings\TestMetaData        $unitTestMeta
     */
    public function it_should_generate_unit_test_settings_from_given_source_settings(
        $testMetaFactory,
        $sourceMeta,
        $unitTestMeta
    ) {
        $sourcePath      = '/src/Vendor/PackageBundle';
        $sourceNamespace = 'Vendor\PackageBundle';

        $sourceMeta->getRootPath()->willReturn($sourcePath);
        $sourceMeta->getRootNamespace()->willReturn($sourceNamespace);

        $unitTestMeta->setRootPath($sourcePath.'/Tests/Unit')->shouldBeCalled();
        $unitTestMeta->setRootNamespace($sourceNamespace.'\Tests\Unit')->shouldBeCalled();
        $unitTestMeta->enable()->shouldBeCalled();

        $testMetaFactory->create()->shouldBeCalled()->willReturn($unitTestMeta);
        $this->generateUnitTestSettings($sourceMeta)->shouldReturn($unitTestMeta);
    }

    /**
     * @param NullDev\Nemesis\PackageSettings\TestMetaDataFactory $testMetaFactory
     * @param NullDev\Nemesis\PackageSettings\SourceMetaData      $sourceMeta
     * @param NullDev\Nemesis\PackageSettings\TestMetaData        $intTestMeta
     */
    public function it_should_generate_integration_test_settings_from_given_source_settings(
        $testMetaFactory,
        $sourceMeta,
        $intTestMeta
    ) {
        $sourcePath      = '/src/Vendor/PackageBundle';
        $sourceNamespace = 'Vendor\PackageBundle';

        $sourceMeta->getRootPath()->willReturn($sourcePath);
        $sourceMeta->getRootNamespace()->willReturn($sourceNamespace);

        $intTestMeta->setRootPath($sourcePath.'/Tests/Integration')->shouldBeCalled();
        $intTestMeta->setRootNamespace($sourceNamespace.'\Tests\Integration')->shouldBeCalled();
        $intTestMeta->disable()->shouldBeCalled();

        $testMetaFactory->create()->shouldBeCalled()->willReturn($intTestMeta);
        $this->generateIntegrationTestSettings($sourceMeta)->shouldReturn($intTestMeta);
    }

    /**
     * @param NullDev\Nemesis\PackageSettings\TestMetaDataFactory $testMetaFactory
     * @param NullDev\Nemesis\PackageSettings\SourceMetaData      $sourceMeta
     * @param NullDev\Nemesis\PackageSettings\TestMetaData        $funcTestMeta
     */
    public function it_should_generate_functional_test_settings_from_given_source_settings(
        $testMetaFactory,
        $sourceMeta,
        $funcTestMeta
    ) {
        $sourcePath      = '/src/Vendor/PackageBundle';
        $sourceNamespace = 'Vendor\PackageBundle';

        $sourceMeta->getRootPath()->willReturn($sourcePath);
        $sourceMeta->getRootNamespace()->willReturn($sourceNamespace);

        $funcTestMeta->setRootPath($sourcePath.'/Tests/Functional')->shouldBeCalled();
        $funcTestMeta->setRootNamespace($sourceNamespace.'\Tests\Functional')->shouldBeCalled();
        $funcTestMeta->disable()->shouldBeCalled();

        $testMetaFactory->create()->shouldBeCalled()->willReturn($funcTestMeta);
        $this->generateFunctionalTestSettings($sourceMeta)->shouldReturn($funcTestMeta);
    }

    /**
     * @param NullDev\Nemesis\PackageSettings\TestMetaDataFactory $testMetaFactory
     * @param NullDev\Nemesis\PackageSettings\SourceMetaData      $sourceMeta
     * @param NullDev\Nemesis\PackageSettings\TestMetaData        $testMeta
     */
    public function it_should_generate_test_settings_from_given_source_settings_and_suffix(
        $testMetaFactory,
        $sourceMeta,
        $testMeta
    ) {
        $sourcePath      = '/src/Vendor/PackageBundle';
        $sourceNamespace = 'Vendor\PackageBundle';

        $sourceMeta->getRootPath()->willReturn($sourcePath);
        $sourceMeta->getRootNamespace()->willReturn($sourceNamespace);

        $testMeta->setRootPath($sourcePath.'/Tests/Type')->shouldBeCalled();
        $testMeta->setRootNamespace($sourceNamespace.'\Tests\Type')->shouldBeCalled();

        $testMetaFactory->create()->shouldBeCalled()->willReturn($testMeta);
        $this->generateTestSettings($sourceMeta, 'Type')->shouldReturn($testMeta);
    }

    public function it_should_generate_root_namespace_from_root_path()
    {
        $this->calculateRootNamespaceFromRootPath('/src/Vendor/PackageBundle')->shouldReturn('Vendor\PackageBundle');
    }

    public function it_should_generate_root_namespace_from_location_last_src_occurance_in_root_path()
    {
        $this->calculateRootNamespaceFromRootPath('/src/app/src/Vendor/PackageBundle')
            ->shouldReturn('Vendor\PackageBundle');
        $this->calculateRootNamespaceFromRootPath('/lib/src/app/src/Vendor/PackageBundle')
            ->shouldReturn('Vendor\PackageBundle');
    }

    public function it_should_generate_root_namespace_from_root_path_given_with_trailing_slash()
    {
        $this->calculateRootNamespaceFromRootPath('/src/Vendor/PackageBundle/')->shouldReturn('Vendor\PackageBundle');
    }

    public function it_should_throw_exception_when_generating_root_namespace_from_unrecognizable_root_path()
    {
        $this->shouldThrow('\Exception')->duringCalculateRootNamespaceFromRootPath('/lib/Vendor/PackageBundle/');
    }
}
