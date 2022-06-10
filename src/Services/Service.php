<?php

namespace Codepotato\CashCalc\Services;

use Codepotato\CashCalc\Data\Config;
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

        if ($this->getMockClient() instanceof MockClient) {
            $this->connector->withMockClient($this->getMockClient());
        }
    }

    /**
     * Get the CashCalc config
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
