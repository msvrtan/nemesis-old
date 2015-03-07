<?php

namespace NullDev\Nemesis\Target;

use NullDev\Nemesis\Target\TestMetaDataFactory;
use NullDev\Nemesis\PackageSettings\SourceMetaData;
use NullDev\Nemesis\PackageSettings\TestMetaData as PackageTestMetaData;
use NullDev\Nemesis\Source\ClassMetaData;

class TestMetaDataGenerator
{
    protected $testMetaFactory;

    public function __construct(TestMetaDataFactory $testMetaFactory)
    {
        $this->testMetaFactory = $testMetaFactory;
    }

    /**
     * @param SourceMetaData      $packageSourceMeta
     * @param PackageTestMetaData $packageTestMeta
     * @param ClassMetaData       $sourceMeta
     *
     * @return TestMetaData
     *
     * @todo: rewrite this method, it was monkey patched.
     */
    public function generate(
        SourceMetaData $packageSourceMeta,
        PackageTestMetaData $packageTestMeta,
        ClassMetaData $sourceMeta
    ) {
        $testMeta = $this->testMetaFactory->create();

        $testMeta->setClassName($sourceMeta->getClassName().'Test');

        $testClassName = str_replace(
            $packageSourceMeta->getRootNamespace(),
            $packageTestMeta->getRootNamespace(),
            $sourceMeta->getFullyQualifiedClassName()
        );

        $testMeta->setFullyQualifiedClassName($testClassName.'Test');

        $testPath = str_replace(
            $packageSourceMeta->getRootPath(),
            $packageTestMeta->getRootPath(),
            $sourceMeta->getFilePath()
        );

        $testPath = str_replace('.php', 'Test.php', $testPath);

        $testMeta->setFilePath($testPath);

        return $testMeta;
    }
}
