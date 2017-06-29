<?php

namespace Schoox\Api\Clients;

use Schoox\Api\Services\SchooxService;

class SchooxApiBase
{
    protected $service;

    public function __construct(SchooxService $service = null)
    {
        $this->service = $service ? $service : new SchooxService;
    }
}
