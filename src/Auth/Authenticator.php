<?php

namespace Codepotato\CashCalc\Auth;

use Carbon\CarbonInterface;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Http\Auth\AccessTokenAuthenticator;

class Authenticator extends AccessTokenAuthenticator
{
    /**
     * @param string $accessToken
     * @param string $refreshToken
     * @param CarbonInterface $expiresAt
     * @param string $clientId
     */
    public function __construct(
        public string $accessToken,
        public string $refreshToken,
        public CarbonInterface $expiresAt,
        public string $clientId,
    ) {
        //
    }

    /**
     * Apply the authentication
     *
     * @param SaloonRequest $request
     * @return void
     */
    public function set(SaloonRequest $request): void
    {
        parent::set($request);

        $request->addHeader('X-Client-ID', $this->clientId);
    }
}
