<?php

namespace NullDev\Nemesis\PackageSettings;

class SourceMetaData
{
    /**
     * @var string Path to the root.
     */
    protected $rootPath;

    /**
     * @var string Namespace that points to root.
     */
    protected $rootNamespace;

    /**
     * @var array List of folders to exclude.
     */
    protected $excludeFolders = [];

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
     * @return array
     */
    public function getExcludeFolders()
    {
        return $this->excludeFolders;
    }

    /**
     * @param array $excludeFolders
     *
     * @return $this
     */
    public function setExcludeFolders($excludeFolders)
    {
        $this->excludeFolders = $excludeFolders;

        return $this;
    }

    /**
     * @param string $excludeFolder
     *
     * @return $this
     */
    public function addExcludeFolders($excludeFolder)
    {
        $this->excludeFolders[] = $excludeFolder;

        return $this;
    }
}
