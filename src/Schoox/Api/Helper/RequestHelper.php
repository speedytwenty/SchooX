<?php

namespace Schoox\Api\Helper;


class RequestHelper
{
    private $url;
    private $path;
    private $params = [];

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function addQueryParameter($var, $val)
    {
        $this->params[$var] = $val;
    }

    public function addAuthentication($apiKey, $acadId)
    {
        $this->addQueryParameter('apikey', $apiKey);
        $this->addQueryParameter('acadId', $acadId);
    }

    public function getRequestUrl()
    {
        $query = $this->params ? '?' . http_build_query($this->params) : null;
        return $this->url . $query;

    }

    public function __toString()
    {
        return $this->getRequestUrl();
    }

    public function addNonBlankQueryString($var, $val)
    {
        if ($val !== nulL) {
            $this->addQueryParameter($var, $val);
        }
    }
}
