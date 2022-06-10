<?php

namespace Codepotato\CashCalc\Requests;

use Sammyjo20\Saloon\Http\SaloonRequest;
use Codepotato\CashCalc\Connectors\ApiConnector;

class Request extends SaloonRequest
{
    /**
     * @var string|null
     */
    protected ?string $connector = ApiConnector::class;
}
