<?php

namespace Schoox\Tests\Api\Models;

use Schoox\Api\Models\Model;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\Serializer;
use Doctrine\Common\Annotations\AnnotationRegistry;

use JMS\Serializer\Annotation AS JMS;

class ModelTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $client = new TestModel($this->createMock('JMS\Serializer\Serializer'));
        $this->assertInstanceOf(TestModel::class, $client);
    }

    public function testToJsonSimple()
    {
        $client = new TestModel($this->getTestSerializer());
        $result = $client->toJson($client, TestModel::class);
        $expected = json_encode([
            'y' => 'x',
        ]);
        $this->assertEquals($expected, $result);
    }

    public function getTestSerializer()
    {
        return SerializerBuilder::create()->build();
    }
}

class TestModel extends Model
{
    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("y")
     */
    public $simpleString = 'x';
}
