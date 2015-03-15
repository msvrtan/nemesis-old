<?php

namespace NullDev\Nemesis\Target\Import;

use NullDev\Nemesis\Target\Import\ImportItem;

class ImportCollection
{
    protected $list = [];

    /**
     * @param string $className
     * @param string $classAlias
     *
     * @return $this
     */
    public function addClass($className, $classAlias = null)
    {
        $item = new ImportItem($className, $classAlias);

        return $this->add($item);
    }

    /**
     * @param ImportItem $item
     *
     * @return $this
     */
    public function add(ImportItem $item)
    {
        $this->list[] = $item;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->list;
    }

    public function render()
    {
        $result = [];

        foreach ($this->list as $importItem) {
            $item = 'use '.$importItem->getClassName();
            if ($importItem->hasClassAlias()) {
                $item .= ' as '.$importItem->getClassAlias();
            }

            $result[] = $item.';';
        }

        return implode(PHP_EOL, $result);
    }

    public function __toString()
    {
        return $this->render();
    }
}
