<?php

namespace Schoox\Tests\Api\Services;

use Schoox\Api\Services\SchooxService;
use Schoox\Api\Services\SchooxResponse;

class ServicesTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructWithCustomParams()
    {
        $s = new SchooxService('somekey', 123, 'http://example.com');
        $this->assertEquals('somekey', $s->getApiKey());
        $this->assertEquals(123, $s->getAcademyId());
        $this->assertEquals('http://example.com', $s->getBaseUrl());
        /** Test with no custom url **/
        $s = new SchooxService('somekey', 123);
        $this->assertEquals('somekey', $s->getApiKey());
        $this->assertEquals(123, $s->getAcademyId());
        $this->assertEquals(SchooxService::DEFAULT_URL, $s->getBaseUrl());
    }

    public function testConstructFromDefaults()
    {
        foreach (['SCHOOX_APIKEY', 'SCHOOX_ACADID'] AS $c) {
            if (!defined($c)) {
                $this->markTestSkipped(sprintf('Schoox config incomplete. %s is not defined.', $c));
            }
            $s = new SchooxService;
            $this->assertEquals(SCHOOX_APIKEY, $s->getApiKey());
            $this->assertEquals(SCHOOX_ACADID, $s->getAcademyId());
            $this->assertEquals(SchooxService::DEFAULT_URL, $s->getBaseUrl());
        }
    }

    public function testGenerateBaseRequest()
    {
        $service = new SchooxService('schoox', 386);
        $request = $service->generateBaseRequest('test');

        $expected = SchooxService::DEFAULT_URL . '/test?apiKey=schoox&acadId=386';
        $this->assertEquals($expected, $request->getRequestUrl());
    }

    public function testExecuteRequest()
    {
        $service = new SchooxService('schoox', 386);
        $request = $service->generateBaseRequest('users');
        $request->addQueryParameter('role', 'employee');
        $response = $service->executeRequest($request);
        $this->assertInstanceOf(SchooxResponse::class, $response);
    }
}
