<?php
namespace Eddy\AflTables\Parser;

use Eddy\AflTables\Contract\Parser;
use Eddy\AflTables\Contract\DataMap;
use Eddy\AflTables\Contract\FactoryManager;
use Eddy\AflTables\Factory\Manager;

abstract class BaseParser implements Parser
{
    protected $factories;

    protected $map;

    abstract public function parse(string $input): array;

    public function __construct(
        DataMap $map = null,
        FactoryManager $factories = null
    ) {
        $this->map = $map; // todo HTML maps
        $this->factories = $factories ?? new Manager();
    }
}
