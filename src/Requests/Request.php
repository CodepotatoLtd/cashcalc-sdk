<?php

namespace Codepotato\SDK\Requests;

use Sammyjo20\Saloon\Http\SaloonRequest;
use Codepotato\SDK\Connectors\ApiConnector;

class Request extends SaloonRequest
{
    /**
     * @var string|null
     */
    protected ?string $connector = ApiConnector::class;
}
