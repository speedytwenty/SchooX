<?php

namespace Schoox\Api\Models;

use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use Schoox\Api\Models\Model;

abstract class Model
{
    private $serializer;

    public function __construct(Serializer $serializer = null)
    {
        $this->serializer = $serializer ? $serialize : $this->defaultSerializer();
    }

    public function toJson()
    {
        $arr = $this->toArray();
        return json_encode($arr);
    }

    public function toArray()
    {
        $arr = $this->serializer->toArray($this);
        unset($arr['serializer']);
        return $arr;
    }

    static public function createFromArray(array $data)
    {
        $serializer = SerializerBuilder::create()->build();
        return $serializer->deserialize(json_encode($data), static::class, 'json');
    }

    public function defaultSerializer()
    {
        return SerializerBuilder::create()->build();
    }

    public function __toString()
    {
        return $this->toJson();
    }
}
