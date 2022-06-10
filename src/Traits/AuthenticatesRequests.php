<?php

namespace Codepotato\CashCalc\Traits;

use Codepotato\CashCalc\Auth\Authenticator;
use Sammyjo20\Saloon\Interfaces\AuthenticatorInterface;

trait AuthenticatesRequests
{
    /**
     * Define an authenticator for requests.
     *
     * @param Authenticator $authenticator
     * @return \Codepotato\CashCalc\CashCalc|AuthenticatesRequests
     */
    public function withAuthentication(AuthenticatorInterface $authenticator): self
    {
        $this->apiConnector->withAuth($authenticator);

        return $this;
    }
}
