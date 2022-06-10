<?php

namespace Codepotato\SDK\Traits;

use Codepotato\SDK\Auth\Authenticator;

trait AuthenticatesRequests
{
    /**
     * Define an authenticator for requests.
     *
     * @param Authenticator $authenticator
     * @return \Codepotato\SDK\SDK|AuthenticatesRequests
     */
    public function withAuthentication(Authenticator $authenticator): self
    {
        $this->apiConnector->withAuth($authenticator);

        return $this;
    }
}
