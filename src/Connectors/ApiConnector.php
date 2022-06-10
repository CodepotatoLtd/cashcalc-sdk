<?php

namespace Codepotato\CashCalc\Connectors;

use Codepotato\CashCalc\CashCalc;
use Codepotato\CashCalc\Data\Config;
use Sammyjo20\Saloon\Http\SaloonConnector;
use Sammyjo20\Saloon\Traits\Plugins\AcceptsJson;
use Codepotato\CashCalc\Responses\CashCalcResponse;
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
    protected ?string $response = CashCalcResponse::class;

    /**
     * The CashCalc configuration.
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
        $this->requests = CashCalc::$services;
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
     * Get the CashCalc config.
     *
     * @return Config
     */
    public function getSdkConfig(): Config
    {
        return $this->config;
    }
}
