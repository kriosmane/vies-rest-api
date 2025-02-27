# This is my package vies-rest-api

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kriosmane/vies-rest-api.svg?style=flat-square)](https://packagist.org/packages/kriosmane/vies-rest-api)
[![Total Downloads](https://img.shields.io/packagist/dt/kriosmane/vies-rest-api.svg?style=flat-square)](https://packagist.org/packages/kriosmane/vies-rest-api)

This package provides an interface to interact with the VIES (VAT Information Exchange System) REST API in Laravel, allowing you to validate VAT numbers within the European Union.

## Future Enhancements

New features and improvements will be added in future releases to enhance functionality and usability. Stay tuned for updates!

## Installation

You can install the package via composer:

```bash
composer require kriosmane/vies-rest-api
```

You can publish the config file with (optional):

```bash
php artisan vendor:publish --tag="vies-rest-api-config"
```

### For Laravel 5.4 and below

Manually add the service provider to your `config/app.php` file:

```php
'providers' => [
    // Other service providers...
    Kriosmane\ViesApi\ViesApiServiceProvider::class,
],
```

## Usage

```php
$viesApi = new ViesApi();
echo $viesApi->echoPhrase('Hello, Krios Mane!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Krios Mane](https://github.com/kriosmane)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
