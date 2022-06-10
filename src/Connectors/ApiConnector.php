<?php

namespace Codepotato\SDK\Connectors;

use Codepotato\SDK\Data\Config;
use Codepotato\SDK\SDK;
use Sammyjo20\Saloon\Http\SaloonConnector;
use Codepotato\SDK\Responses\SDKResponse;
use Sammyjo20\Saloon\Traits\Plugins\AcceptsJson;
use Sammyjo20\Saloon\Traits\Auth\RequiresTokenAuth;

class ApiConnector extends SaloonConnector
{
    use AcceptsJson;
    use RequiresTokenAuth;

    /**
     * Custom response that all requests will return.
     *
     * @var string|null
     */
    protected ?string $response = SDKResponse::class;

    /**
     * The SDK configuration.
     *
     * @var Config
     */
    protected Config $config;

    /**
     * Apply the services from the base class.
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->requests = SDK::$services;
    }

    /**
     * Define the base URL of the API.
     *
     * @return string
     */
    public function defineBaseUrl(): string
    {
        return $this->config->baseUrl;
    }

    /**
     * Default headers used for the request.
     *
     * @return string[]
     */
    public function defaultHeaders(): array
    {
        return [
            //
        ];
    }

    /**
     * Default config used for the request.
     *
     * @return string[]
     */
    public function defaultConfig(): array
    {
        return [
            //
        ];
    }

    /**
     * Get the SDK config.
     *
     * @return Config
     */
    public function getSdkConfig(): Config
    {
        return $this->config;
    }
}
