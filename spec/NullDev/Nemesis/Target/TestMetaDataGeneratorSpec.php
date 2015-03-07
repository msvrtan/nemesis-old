<?php

namespace spec\NullDev\Nemesis\Target;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TestMetaDataGeneratorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Target\TestMetaDataGenerator');
    }

    /**
     * @param NullDev\Nemesis\Target\TestMetaDataFactory $testMetaFactory
     */
    public function let($testMetaFactory)
    {
        $this->beConstructedWith($testMetaFactory);
    }

    /**
     * @param NullDev\Nemesis\Target\TestMetaDataFactory     $testMetaFactory
     * @param NullDev\Nemesis\Target\TestMetaData            $testMeta
     * @param NullDev\Nemesis\PackageSettings\SourceMetaData $packageSourceMeta
     * @param NullDev\Nemesis\PackageSettings\TestMetaData   $packageTestMeta
     * @param NullDev\Nemesis\Source\ClassMetaData           $sourceMeta
     */
    public function it_should_generate_something_todo(
        $testMetaFactory,
        $packageSourceMeta,
        $packageTestMeta,
        $sourceMeta,
        $testMeta
    ) {
        $testMetaFactory->create()->shouldBeCalled()->willReturn($testMeta);

        $packageSourceMeta
            ->getRootPath()
            ->willReturn('/lib/application/src/Vendor/SomeBundle');
        $packageSourceMeta
            ->getRootNamespace()
            ->willReturn('Vendor\SomeBundle');

        $packageTestMeta
            ->getRootPath()
            ->willReturn('/lib/application/src/Vendor/SomeBundle/Tests/Unit');
        $packageTestMeta
            ->getRootNamespace()
            ->willReturn('Vendor\SomeBundle\Tests\Unit');

        $sourceMeta
            ->getFilePath()
            ->willReturn('/lib/application/src/Vendor/SomeBundle/Namespace/ClassName.php');
        $sourceMeta
            ->getClassName()
            ->willReturn('ClassName');
        $sourceMeta
            ->getFullyQualifiedClassName()
            ->willReturn('Vendor\SomeBundle\Namespace\ClassName');

        $testMeta
            ->setFilePath('/lib/application/src/Vendor/SomeBundle/Tests/Unit/Namespace/ClassNameTest.php')
            ->shouldBeCalled();
        $testMeta
            ->setClassName('ClassNameTest')
            ->shouldBeCalled();
        $testMeta
            ->setFullyQualifiedClassName('Vendor\SomeBundle\Tests\Unit\Namespace\ClassNameTest')
            ->shouldBeCalled();

        $this->generate($packageSourceMeta, $packageTestMeta, $sourceMeta)->shouldReturn($testMeta);
    }
}
