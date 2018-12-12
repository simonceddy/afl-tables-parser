<?php
namespace Eddy\AflTables\Support;

use Eddy\AflTables\Contract\Factory;

trait HasFactoryArray
{
    protected $factories = [];

    /**
     * Fetches a factory from the $factories array.
     *
     * @param string $name
     * @return Factory|bool
     */
    public function factory(string $name)
    {
        return $this->factories[$name] ?? false;
    }

    /**
     * Add an array of factories to the $factories array.
     *
     * @param array $factories
     * @return void
     */
    public function addFactories(array $factories)
    {
        //var_dump($factories);
        foreach ($factories as $name => $factory) {
            if (null !== $factory) {
                
                $this->addFactoryAs($name, $factory);
            }
        }
        /* var_dump($this->factories);
        die(); */
        return $this;
    }

    /**
     * Adds a factory to the $factories array as $name.
     * 
     * If the allowed_factories property is an array the method will check if
     * $name is whitelisted, and will throw an exception if not.
     * 
     * If allowed_factories is not an array all names will be accepted.
     *
     * @param string $name
     * @param Factory $factory
     * @return self
     */
    public function addFactoryAs(string $name, Factory $factory)
    {
        if (isset($this->allowed_factories)
            && is_array($this->allowed_factories)
            && !empty($this->allowed_factories)
            && !in_array($name, $this->allowed_factories)
        ) {
            throw new \InvalidArgumentException(
                $name.' is not a valid factory name for '.get_class($this).'.'
            );
        }
        $this->factories[$name] = $factory;
        return $this;
    }
}
