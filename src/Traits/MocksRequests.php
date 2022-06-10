<?php

namespace Codepotato\SDK\Traits;

use Sammyjo20\Saloon\Clients\MockClient;

trait MocksRequests
{
    /**
     * Define a mock client used instead of making the requests.
     *
     * @param MockClient $mockClient
     * @return \Codepotato\SDK\SDK|MocksRequests
     */
    public function withMockClient(MockClient $mockClient): self
    {
        $this->config->mockClient = $mockClient;

        return $this;
    }
}
