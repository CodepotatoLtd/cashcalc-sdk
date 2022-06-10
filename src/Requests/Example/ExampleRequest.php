<?php

namespace Codepotato\CashCalc\Requests\Example;

use Sammyjo20\Saloon\Constants\Saloon;
use Codepotato\CashCalc\Requests\Request;

class ExampleRequest extends Request
{
    /**
     * Define the method that the request will use.
     *
     * @var string|null
     */
    protected ?string $method = Saloon::GET;

    /**
     * @return string
     */
    public function defineEndpoint(): string
    {
        return '/';
    }
}
