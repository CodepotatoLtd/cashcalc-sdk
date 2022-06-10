<?php

namespace Codepotato\CashCalc\Connectors;

use Carbon\CarbonInterface;
use Sammyjo20\Saloon\Http\SaloonConnector;
use Codepotato\CashCalc\Auth\Authenticator;
use Sammyjo20\Saloon\Traits\OAuth2\AuthorizationCodeGrant;
use Sammyjo20\Saloon\Interfaces\OAuthAuthenticatorInterface;

class CashCalcAuth extends SaloonConnector
{
    use AuthorizationCodeGrant;

    /**
     * Base URL.
     *
     * @return string
     */
    public function defineBaseUrl(): string
    {
        return 'https://cashcalc.co.uk/oauth';
    }

    /**
     * @param string $clientId
     * @param string $clientSecret
     * @param string|null $redirectUri
     */
    public function __construct(string $clientId, string $clientSecret, string $redirectUri = null)
    {
        $this->oauthConfig()->setClientId($clientId);
        $this->oauthConfig()->setClientSecret($clientSecret);
        $this->oauthConfig()->setRedirectUri($redirectUri);
    }

    /**
     * Create the oauth authenticator class
     *
     * @param string $accessToken
     * @param string $refreshToken
     * @param CarbonInterface $expiresAt
     * @return OAuthAuthenticatorInterface
     */
    protected function createOAuthAuthenticator(string $accessToken, string $refreshToken, CarbonInterface $expiresAt): OAuthAuthenticatorInterface
    {
        return new Authenticator($accessToken, $refreshToken, $expiresAt, $this->oauthConfig()->getClientId());
    }
}
