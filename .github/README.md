(Work in progress! Please use with caution)

# Cashcalc PHP SDK
Unofficial PHP SDK for the Cashcalc API.

## Authentication

To get started, you will need to authorize your application with Cashcalc. They provide an OAuth2 Authorization Code flow. To get started, create a new instance of `Codepotato\CashCalc\Connectors\CashCalcAuth`. You are required to provide a Client ID and a Client Secret, and if you are generating an authorization URL, you also should provide the redirect uri.

```php
$auth = new CashCalcAuth(
    clientId: 'my-client-id',
    clientSecret: 'my-client-secret',
    redirectUri: 'redirect-uri',
);
```

After you have created the auth connector, you can use it to follow the OAuth2 flow.

```php
$authorizationUrl = $auth->getAuthorizationUrl($scopes = [], $state = null);

$authenticator = $auth->createAccessToken($code, $state = null, $expectedState = null);

$refreshedAuthenticator = $auth->refreshAccessToken($authenticator|$refreshToken);
```

## Authenticating The SDK

After you have retrieved the access tokens from the OAuth2 process, you can instantiate the SDK and start making requests!

```php
$cashCalc = new CashCalc;
$cashCalc->withAuthentication($authenticator);

// Now make requests!

$response = $cashCalc->clients->all();
```

## Responses

For each SDK method, you will recieve a `CashCalcResponse`. This respose extends `SaloonResponse` and has the following methods:

https://docs.saloon.dev/the-basics/responses

The most common method to retrieve data would be to use `$response->json();` which will return an array of the data. However there are some powerful DTOs already written which are even better for developer experience since there is type-definitions.

## Data Transfer Objects

For each API route, you can also convert the response into a DTO. For example, for clients

```php
$response = $cashCalc->clients->all();

$clients = $response->dto(); // Will return Codepotato\CashCalc\Data\Responses\Client
```
