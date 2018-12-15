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

    /**
     * Add a Factory with an alias/name.
     * 
     * Should throw an InvalidArgumentException if an alias is not allowed.
     *
     * @param string $name
     * @param Factory $factory
     * @return void
     * 
     * @throws \InvalidArgumentException
     */
    public function addFactoryAs(string $name, Factory $factory);
}
