<?php

namespace NullDev\Nemesis\TargetTestGenerators;

use NullDev\Nemesis\Source\ClassMetaData;
use NullDev\Nemesis\Target\TestMetaData;

class BasicUnitTestGenerator
{
    protected $templateName = 'BasicUnitTest';

    protected $sourceMeta;

    protected $targetMeta;

    /**
     * @param ClassMetaData $sourceMeta
     * @param TestMetaData  $targetMeta
     */
    public function __construct(ClassMetaData $sourceMeta, TestMetaData $targetMeta)
    {
        $this->sourceMeta = $sourceMeta;
        $this->targetMeta = $targetMeta;
    }

    /**
     * @return string
     */
    public function getTemplateName()
    {
        return $this->templateName;
    }

    /**
     * @return string
     */
    public function getTargetNamespace()
    {
        $className = $this->targetMeta->getClassName();
        $fqdn      = $this->targetMeta->getFullyQualifiedClassName();

        $namespace = str_replace('\\'.$className, '', $fqdn);

        return $namespace;
    }

    /**
     * @return array
     */
    public function getImports()
    {
        return [
            $this->sourceMeta->getFullyQualifiedClassName(),
            'Mockery as m',
        ];
    }

    public function getTargetClassName()
    {
        return $this->targetMeta->getClassName();
    }
    public function getSourceClassName()
    {
        return $this->sourceMeta->getClassName();
    }
}
