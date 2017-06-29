<?php

namespace Schoox\Api\Services;

use Httpful\Request AS RestClient;
use Schoox\Api\Helper\RequestHelper AS RestRequest;

class SchooxService
{
    const DEFAULT_URL = 'https://www.schoox.com/api/v1';

    private $apiKey, $acadId, $baseUrl;

    public function __construct($apiKey = null, $acadId = null, $baseUrl = null)
    {
        if (!$apiKey && defined('SCHOOX_APIKEY')) $apiKey = SCHOOX_APIKEY;
        if (!$acadId && defined('SCHOOX_ACADID')) $acadId = SCHOOX_ACADID;
        if (!$baseUrl)  $baseUrl = defined('SCHOOX_BASEURL') ? SCHOOX_BASEURL : static::DEFAULT_URL;

        $this->apiKey = $apiKey;
        $this->acadId = $acadId;
        $this->baseUrl = $baseUrl;
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function getAcademyId()
    {
        return $this->acadId;
    }

    public function generateBaseRequest($requestPath, $authenticate = true)
    {
        $request = new RestRequest($this->baseUrl . '/' . $requestPath);
        if ($authenticate) {
            $request->addAuthentication($this->apiKey, $this->acadId);
        }
        return $request;
    }

    public function executeRequest(RestRequest $request)
    {
        $response = RestClient::get($request->getRequestUrl())->send();
        return new SchooxResponse($response->code, $response->body, $response->hasErrors(), $response->request->uri);
    }

    public function executePostRequest(RestRequest $request, $payload = null)
    {
        $response = RestClient::post($request->getRequestUrl(), $payload, 'application/json')->send();
        return new SchooxResponse($response->code, $response->body, $response->hasErrors(), $response->request->uri);
    }

    public function executePutRequest(RestRequest $request, $payload = null)
    {
        $response = RestClient::put($request->getRequestUrl(), $payload, 'application/json')->send();
        return new SchooxResponse($response->code, $response->body, $response->hasErrors(), $response->request->uri);
    }

    public function executeDeleteRequest(RestRequest $request)
    {
        $response = RestClient::delete($request->getRequestUrl(), 'application/json')->send();
        return new SchooxResponse($response->code, $response->body, $response->hasErrors(), $response->request->uri);
    }
}
