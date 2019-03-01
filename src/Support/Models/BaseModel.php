<?php
namespace AflParser\Support\Models;

use Ramsey\Uuid\Uuid;

abstract class BaseModel extends \ArrayObject
{
    /**
     * Array of model attributes.
     *
     * @var array
     */
    protected $attributes;

    /**
     * Models UUID
     *
     * @var Uuid
     */
    protected $uuid;

    public function __construct(array $data = [])
    {
        if (!empty($data)) {
            // validate data
        }
        parent::__construct($data, static::ARRAY_AS_PROPS);
    }
}
