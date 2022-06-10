<?php

namespace Codepotato\CashCalc\Traits;

use Sammyjo20\Saloon\Clients\MockClient;

trait MocksRequests
{
    /**
     * Define a mock client used instead of making the requests.
     *
     * @param MockClient $mockClient
     * @return \Codepotato\CashCalc\CashCalc|MocksRequests
     */
    public function withMockClient(MockClient $mockClient): self
    {
        $this->config->mockClient = $mockClient;

        return $this;
    }
}
