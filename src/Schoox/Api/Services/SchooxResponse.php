<?php

namespace Schoox\Api\Services;


class SchooxResponse
{
    private $code, $body, $hasErrors, $requestUrl;

    public function __construct($code, $body, $hasErrors = false, $requestUrl = null)
    {
        $this->code = $code;
        $this->body = $body;
        $this->hasErrors = $hasErrors;
        $this->requestUrl = $requestUrl;
    }

    public function hasErrors()
    {
        return $this->hasErrors;
    }

    public function getStatusCode()
    {
        return $this->code;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getRequestUrl()
    {
        return $this->requestUrl;
    }
}
