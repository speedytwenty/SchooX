<?php

namespace Schoox\Tests\Api;

use Schoox\Api\Request;
use Schoox\Configuration;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateUrlBasic()
    {
        $request = new Request(SCHOOX_ACADID, SCHOOX_APIKEY);
        $expected = 'https://www.schoox.com/api/v1/test?acadId=' . SCHOOX_ACADID . '&apikey=' . SCHOOX_APIKEY;
        $this->assertEquals($expected, $request->createUrl('test'));
        return $request;
    }

    /**
     * @depends testCreateUrlBasic
     */
    public function testGet(Request $request)
    {
        $response = $request->get('users', ['role' => 'employee', 'limit' => 1]);
        $this->assertEquals(false, $response->hasErrors());
        $this->assertTrue($response->hasBody());
    }
}
