<?php
namespace Eddy\AflTables\Model;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Eddy\AflTables\Contract\Model;
use Carbon\Carbon;

abstract class BaseModel implements Model
{
    protected $values = [];

    protected $attributes;

    protected $unset_attributes = [];

    /**
     * Creation timestamp
     *
     * @var int
     */
    protected $created_on;

    protected $updated_on;

    /**
     * The model's UUID
     *
     * @var UuidInterface
     */
    protected $uuid;

    protected $is_new = true;

    public function __construct(array $data = [], array $options = [])
    {
        empty($data) ?: $this->initAttributesFromData($data, $options);
    }

    protected function initAttributesFromData(array $data)
    {
        if (!isset($this->attributes)) {
            // TODO: handle null attributes
            return;
        }
        if ($this->is_new
            && (!isset($options['no_timestamps']) || !$options['no_timestamps'])
        ) {
            $this->generateCreatedOn();
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

    protected function generateCreatedOn()
    {
        $this->created_on = Carbon::now()->timestamp;
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

    public function set(string $attribute, $value)
    {
        if (!empty($this->attributes)
            && !in_array($attribute, $this->attributes)
        ) {
            throw new \InvalidArgumentException(
                'Invalid attribute: '.$attribute.'.'
            );
        }
        // TODO: validate if attributes entry is array
        $this->values[$attribute] = $value;
        return $this;
    }

    public function get(string $attribute)
    {
        if (!empty($this->attributes)
            && !in_array($attribute, $this->attributes)
        ) {
            throw new \InvalidArgumentException(
                'Invalid attribute: '.$attribute.'.'
            );
        }
        return $this->values[$attribute] ?? null;
    }

    public function hasValue(string $attribute)
    {
        return isset($this->values[$attribute]);
    }

    public function hasAttribtue(string $attribute)
    {
        return !isset($this->attributes) ? false : isset(
            $this->attributes[$attribute]
        );
    }

    public function toArray()
    {
        $result = $this->values;
        !isset($this->created_on) ?: $result['created'] = $this->created_on;
        !isset($this->updated_on) ?: $result['updated'] = $this->updated_on;
        !isset($this->uuid) ?: $result['uuid'] = $this->uuid->toString();
        return $result;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
