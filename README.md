# fitbit-http-php [![release](https://img.shields.io/github/release/namelivia/fitbit-http-php.svg)](https://github.com/namelivia/fitbit-http-php/releases) [![Build Status](https://travis-ci.org/namelivia/fitbit-http-php.svg?branch=master)](https://travis-ci.org/namelivia/fitbit-http-php) [![codecov](https://codecov.io/gh/namelivia/fitbit-http-php/branch/master/graph/badge.svg)](https://codecov.io/gh/namelivia/fitbit-http-php) [![StyleCI](https://github.styleci.io/repos/188383877/shield?branch=master)](https://github.styleci.io/repos/188383877)

<p align="center">
  <img src="https://user-images.githubusercontent.com/1571416/58320709-9675d700-7e1c-11e9-8a4f-c082d68a7499.png" alt="Fitbit PHP SDK" />
</p>

## About

This is a package for acessing the [Fitbit official Web API](https://dev.fitbit.com/build/reference/web-api/) from your PHP language project. It is designed so you can easily query and retrieve
all data hold on their platform from Activity Logs to Sleep or Heart Rate information.

## TODO
**Disclaimer:** The Fitbit API is divided in various sections. Currently only the following sections are implemented on the current version:

- Activities & Exercise Logs

While these other are still pending:

- User
- Subscriptions
- Sleep
- Heart Rate
- Friends
- Food Logging
- Devices
- Body & Weight

All sections are planned, you can check the progress and planning by browsing the [issues section of this repository](https://github.com/namelivia/fitbit-http-php/issues/new).

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

```bash
$ composer require namelivia/fitbit-http-php:~0.1
```

## Getting started

Before getting started retrieving date from the Fitbit Web API you first need to [register your application](https://dev.fitbit.com/apps/new) on their platfrom [dev.fitbit.com](https://dev.fitbit.com).
Once you submit the form and your application has ben registred, they will provide you with some credentials you need on the next step. These credentials are:
- OAuth 2.0 Client ID
- Client Secret
Also you will provide a callback URL is the URL the client will be redirected from the Fitbit Platfrom after authorizing your application to access their data.

### Provindg credentials
```php

Now to get started you need to create an new instance of the API like this, note that four strings parameters are required to do so:

$api = new \Namelivia\Fitbit\Api\Api(
	'someClientId', #clientId
	'someClientSecret', #clientSecret
	'https://myapp.com/authorized', #redirectUrl
	'/tmp/token' #tokenPath
);
```

The first paramter is the **OAuth 2.0 Client ID** you got from the Fitbit platform, the second parameter is the **Client Secret** you got from the Fitbit platform too.
The third parameter is your applications URL where the users are going to be directed to from the Fitbit authorization screen. And the fourth one is the path where the authorization tokens is going to be stored in order to be rememberd so the authorization screen does not happens everytime.

- clientId: Your application client Id.
- clientSecret: Your application client secret.
- redirectUrl: Your application redirect URL.
- tokenPath: Your token path.

### Authorizing

Now that you have the api, you need to check if the application is alredy authorized by calling `isAuthorized`, if you have a valid token stored on the token path you provided before or you have already providen an authorization code the following won't be necessary. If the api is still unauthorized an authorization code needs to be requested from the authorization Url, this Url can be retrieved by calling the `getAuthUri` function. You can redirect your user to that external Uri and after Fitbit will redirect the user back to your app by making use of the return url provided with the code as a parameter. In this example the code from the Uri is manually typed by the user. Finally once the you have the authorization code the api must be providen with it by calling the `setAuthorizationCode` function.

```php
if (!$api->isAuthorized()) {
	echo 'Go to: ' . $api->getAuthUri() . "\n";
	echo "Enter verification code: \n";
	$code = trim(fgets(STDIN, 1024));
	$api->setAuthorizationCode($code);
}
```

### Initializing

Finally the last step before making the actual requests is to initialize the api, you can check if the api is already initialized by calling `isInitialized` and initialize it by calling `initialize`. This will refresh or create tokens if needed and store them in the token path providen before. Now the api is ready to query data.
```php
if (!$api->isInitialized()) {
	$api->initialize();
}
```

### Getting a fitbit instance

For querying the data you need to get a fitbit instance, and for doing so you need to pass it the recently created an initialized api to the constructor like this:
```php
$fitbit = new \Namelivia\Fitbit\Api\Fitbit($api);
```

### Retrieving data

Everything is ready, you can start asking for the data.
```php
$fitbit->activities()->favorites()->get();
```
For further information 

## Documentation

The full documentation can be found [in the wiki section of the github repository](https://github.com/namelivia/fitbit-http-php/wiki).
Also you can refer to the [official Fitbit Web API documentation](https://dev.fitbit.com/build/reference/web-api/)

## License

[MIT](LICENSE)

## Contributing
Any suggestion, bug reports, ons or any other kind enhacements are welcome. Just [open an
issue first](https://github.com/namelivia/fitbit-http-php/issues/new), for creating a PR remember this project has linting checkings and unit tests so any PR should comply with both before beign merged, this checks will be automatically applied when opening or modifying the PR's.
