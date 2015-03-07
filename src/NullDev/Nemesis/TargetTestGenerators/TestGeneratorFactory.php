<?php

namespace NullDev\Nemesis\TargetTestGenerators;

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
        return new BasicUnitTestGenerator($sourceMeta, $targetMeta);
    }
}
