<?php

namespace NullDev\Nemesis\Target\Import;

class ImportItem
{
    /**
     * @var
     */
    protected $className;

    /**
     * @var
     */
    protected $classAlias;

    /**
     * @param string      $className
     * @param bool|string $classAlias
     */
    public function __construct($className, $classAlias = false)
    {
        $this->className  = $className;
        $this->classAlias = $classAlias;
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @return string
     */
    public function getClassAlias()
    {
        return $this->classAlias;
    }

    /**
     * @return boolean
     */
    public function hasClassAlias()
    {
        if ($this->classAlias) {
            return true;
        } else {
            return false;
        }
    }
}
