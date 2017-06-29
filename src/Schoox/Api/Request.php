<?php

namespace Schoox\Api;

use Httpful;

class Request
{
    private $baseUrl = 'https://www.schoox.com/api/v1';
    private $acadId;
    private $apiKey;

    public function __construct($acadId, $apiKey)
    {
        $this->acadId = $acadId;
        $this->apiKey = $apiKey;
    }

    public function get($path, array $query = array())
    {
        return Httpful\Request::get($this->createUrl($path, $query))
            ->expectsJson()
            ->send();
    }

    public function createUrl($path, array $query = array())
    {
        $query['acadId'] = $this->acadId;
        $query['apikey'] = $this->apiKey;
        return $this->baseUrl . '/' . $path . '?' . http_build_query($query);
    }
}
