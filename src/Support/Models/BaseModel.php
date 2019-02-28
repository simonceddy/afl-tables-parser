<?php
namespace AflParser\Support\Models;

abstract class BaseModel extends \ArrayObject
{
    /**
     * Array of model attributes.
     *
     * @var array
     */
    protected $attributes;

    public function __construct(array $data = [])
    {
        if (!empty($data)) {
            // validate data
        }
        parent::__construct();
    }
}
