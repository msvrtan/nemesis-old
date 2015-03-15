<?php

namespace NullDev\Nemesis\TargetTestGenerators;

use NullDev\Nemesis\Target\Import\ImportCollection;
use NullDev\Nemesis\TargetTestGenerators\BasicUnitTestGenerator;

class TestGeneratorFactory
{
    /**
     * @param NullDev\Nemesis\Source\ClassMetaData $sourceMeta
     * @param NullDev\Nemesis\Target\TestMetaData  $targetMeta
     *
     * @return BasicUnitTestGenerator
     */
    public function createBasicUnit($sourceMeta, $targetMeta)
    {
        return new BasicUnitTestGenerator($this->getImportCollection(), $sourceMeta, $targetMeta);
    }

    public function getImportCollection()
    {
        return new ImportCollection();
    }
}
