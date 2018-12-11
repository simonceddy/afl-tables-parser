<?php
namespace Eddy\AflTables\Model;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Eddy\AflTables\Contract\Model;

abstract class BaseModel implements Model
{
    protected $values = [];

    protected $attributes;

    protected $unset_attributes = [];

    /**
     * The model's UUID
     *
     * @var UuidInterface
     */
    protected $uuid;

    public function __construct(array $data = [])
    {
        empty($data) ?: $this->initAttributesFromData($data);
    }

    protected function initAttributesFromData(array $data)
    {
        if (!isset($this->attributes)) {
            return;
        }
        if (isset($data['uuid'])) {
            $this->uuid = Uuid::fromString($data['uuid']);
            unset($data['uuid']);
        }
        foreach ($this->attributes as $key) {
            if (isset($data[$key])) {
                $this->values[$key] = $data[$key];
            } else {
                $this->unset_attributes[] = $key;
            }
        }
    }

    public function uuid()
    {
        return $this->uuid->toString();
    }

    public function generateUuid()
    {
        isset($this->uuid) ?: $this->uuid = Uuid::uuid1();
        return $this;
    }
}
