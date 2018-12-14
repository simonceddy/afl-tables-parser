<?php
namespace Eddy\AflTables\Contract;

interface FactoryManager
{
    /**
     * Returns the factory with $name.
     * 
     * Returns false if no factory is located.
     *
     * @param string $name
     * @return Factory|bool
     */
    public function factory(string $name);

    public function addFactoryAs(string $name, Factory $factory);
}
