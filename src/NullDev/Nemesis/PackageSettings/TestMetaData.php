<?php

namespace NullDev\Nemesis\PackageSettings;

class TestMetaData
{
    /**
     * @var string Path to the root.
     */
    protected $rootPath;

    /**
     * @var string Namespace that points to root.
     */
    protected $rootNamespace;

    protected $enabled = true;

    /**
     * @return string
     */
    public function getRootPath()
    {
        return $this->rootPath;
    }

    /**
     * @param string $rootPath
     *
     * @return $this
     */
    public function setRootPath($rootPath)
    {
        $this->rootPath = $rootPath;

        return $this;
    }

    /**
     * @return string
     */
    public function getRootNamespace()
    {
        return $this->rootNamespace;
    }

    /**
     * @param string $rootNamespace
     *
     * @return $this
     */
    public function setRootNamespace($rootNamespace)
    {
        $this->rootNamespace = $rootNamespace;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param
     *
     * @return $this
     */
    public function disable()
    {
        $this->enabled = false;

        return $this;
    }

    /**
     * @param
     *
     * @return $this
     */
    public function enable()
    {
        $this->enabled = true;

        return $this;
    }
}
