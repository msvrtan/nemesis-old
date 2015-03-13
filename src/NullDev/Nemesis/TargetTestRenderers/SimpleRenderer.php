<?php

namespace NullDev\Nemesis\TargetTestRenderers;

use NullDev\Nemesis\TargetTestGenerators\BasicUnitTestGenerator;

class SimpleRenderer
{
    protected $targetGenerator;

    public function __construct(BasicUnitTestGenerator $targetGenerator)
    {
        $this->targetGenerator = $targetGenerator;
    }

    public function render()
    {
        $template = new \Text_Template($this->getTemplatePath());

        $vars = $this->targetGenerator->getVars();

        $template->setVar($vars);

        return $template->render();
    }

    public function getTemplatePath()
    {
        return __DIR__.'/templates/'.$this->targetGenerator->getTemplateName().'.tpl';
    }
}
