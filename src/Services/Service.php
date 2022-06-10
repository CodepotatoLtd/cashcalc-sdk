<?php

namespace Codepotato\SDK\Services;

use Codepotato\SDK\Data\Config;
use Sammyjo20\Saloon\Clients\MockClient;
use Sammyjo20\Saloon\Http\RequestCollection;
use Sammyjo20\Saloon\Http\SaloonConnector;

class Service extends RequestCollection
{
    /**
     * @param SaloonConnector $connector
     */
    public function __construct(SaloonConnector $connector)
    {
        parent::__construct($connector);
    }

    /**
     * Get the SDK config
     *
     * @return Config
     */
    public function getConfig(): Config
    {
        return $this->connector->getSdkConfig();
    }

    /**
     * Get the mock client for the request.
     *
     * @return MockClient|null
     */
    public function getMockClient(): ?MockClient
    {
        return $this->getConfig()->mockClient;
    }
}
