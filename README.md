# fitbit-http-php [![release](https://img.shields.io/github/release/namelivia/fitbit-http-php.svg)](https://github.com/namelivia/fitbit-http-php/releases) [![Build Status](https://travis-ci.org/namelivia/fitbit-http-php.svg?branch=master)](https://travis-ci.org/namelivia/fitbit-http-php) [![codecov](https://codecov.io/gh/namelivia/fitbit-http-php/branch/master/graph/badge.svg)](https://codecov.io/gh/namelivia/fitbit-http-php) [![StyleCI](https://github.styleci.io/repos/188383877/shield?branch=master)](https://github.styleci.io/repos/188383877)

<p align="center">
  <img src="https://user-images.githubusercontent.com/1571416/58320709-9675d700-7e1c-11e9-8a4f-c082d68a7499.png" alt="Fitbit PHP SDK" />
</p>


PHP SDK for accessing the Fitbit API
## TODO
Currently only Activities are implemented.

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

```bash
$ composer require namelivia/fitbit-http-php
```

## Getting started

TODO

### Provindg credentials
```php

$api = new \Namelivia\Fitbit\Api\Api(
	'someClientId', #clientId
	'someClientSecret', #clientSecret
	'someRedirectUrl', #redirectUrl
	'/tmp/token' #tokenPath
);
```

- clientId: Your application client Id.
- clientSecret: Your application client secret.
- redirectUrl: Your application redirect URL.
- tokenPath: Your token path.

### Authorizing

Before making requests, the application needs to be authorized.

```php
if (!$api->isAuthorized()) {
	echo 'Go to: ' . $api->getAuthUri() . "\n";
	echo "Enter verification code: \n";
	$code = trim(fgets(STDIN, 1024));
	$api->setAuthorizationCode($code);
}
```

### Initializing

Before making requests, the api client needs to be initialized.
```php
if (!$api->isInitialized()) {
	$api->initialize();
}
```

## Documentation

The full documentation can be found [in the wiki section of the github repository](https://github.com/namelivia/fitbit-http-php/wiki).

## License

[MIT](LICENSE)

## Contributing
Any suggestion, bug reports, ons or any other kind enhacements are welcome. Just [open an
issue first](https://github.com/namelivia/fitbit-http-php/issues/new), for creating a PR remember this project has linting checkings and unit tests so any PR should comply with both before beign merged, this checks will be automatically applied when opening or modifying the PR's.
