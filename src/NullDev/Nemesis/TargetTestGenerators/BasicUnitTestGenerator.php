<?php

namespace NullDev\Nemesis\TargetTestGenerators;

use NullDev\Nemesis\Import\ImportCollection;
use NullDev\Nemesis\Source\ClassMetaData;
use NullDev\Nemesis\Target\TestMetaData;

class BasicUnitTestGenerator
{
    protected $templateName = 'BasicUnitTest';

    protected $importCollection;

    protected $sourceMeta;

    protected $targetMeta;

    /**
     * @param ImportCollection $importCollection
     * @param ClassMetaData    $sourceMeta
     * @param TestMetaData     $targetMeta
     */
    public function __construct(ImportCollection $importCollection, ClassMetaData $sourceMeta, TestMetaData $targetMeta)
    {
        $this->importCollection = $importCollection;
        $this->sourceMeta       = $sourceMeta;
        $this->targetMeta       = $targetMeta;
    }

    /**
     * @return string
     */
    public function getTemplateName()
    {
        return $this->templateName;
    }

    public function getVars()
    {
        return [
            'targetNamespace' => $this->getTargetNamespace(),
            'imports'         => $this->getImports(),
            'targetClassName' => $this->getTargetClassName(),
            'sourceClassName' => $this->getSourceClassName(),
        ];
    }

    /**
     * @return string
     */
    public function getTargetNamespace()
    {
        return $this->targetMeta->getNamespace();
    }

    /**
     * @return array
     */
    public function getImports()
    {
        $this->importCollection->addClass($this->sourceMeta->getFullyQualifiedClassName());
        $this->importCollection->addClass('Mockery', 'm');

        return $this->importCollection;
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
