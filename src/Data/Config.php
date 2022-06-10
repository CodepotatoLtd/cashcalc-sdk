<?php

namespace Codepotato\SDK\Data;

use Sammyjo20\Saloon\Clients\MockClient;

class Config
{
    /**
     * @param string $baseUrl
     * @param MockClient|null $mockClient
     */
    public function __construct(
        public string $baseUrl,
        public ?MockClient $mockClient = null,
    )
    {
        //
    }
}
