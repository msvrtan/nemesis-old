<?php

namespace NullDev\Nemesis\TargetTestRenderers;

use NullDev\Nemesis\TargetTestGenerators\BasicUnitTestGenerator;
use NullDev\Nemesis\TargetTestRenderers\SimpleRenderer;

class RendererFactory
{
    /**
     * @param BasicUnitTestGenerator $targetGenerator
     *
     * @return SimpleRenderer
     */
    public function createSimpleRenderer(BasicUnitTestGenerator $targetGenerator)
    {
        return new SimpleRenderer($targetGenerator);
    }
}
