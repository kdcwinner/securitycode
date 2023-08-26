# securitycode
It will generate a code which will be numbers with 6 digits and it will not be palindrume,not contain same digits more than 3 times, not contain sequencial number more than 3.
Laravel SecurityCode

## Installation
Install the package by the following command,

composer require kdwinner/securitycode

## Add Provider
Add the provider to your config/app.php into provider section if using lower version of laravel,

Kdcwinner\Securitycode\SecuritycodeServiceProvider::class,

## Publish the Assets
Run the following command to publish config file,

php artisan laravel-pwa:publish
Configure Securitycode
## License
The MIT License (MIT). Please see <a href="/shailesh-ladumor/laravel-pwa/blob/master/LICENSE.md">License</a> File for more information