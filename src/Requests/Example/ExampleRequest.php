<?php

namespace Codepotato\SDK\Requests\Example;

use Sammyjo20\Saloon\Constants\Saloon;
use Codepotato\SDK\Requests\Request;

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
