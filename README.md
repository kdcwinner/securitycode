# securitycode
It will generate a code which will be numbers with 6 digits and it will not be palindrume,not contain same digits more than 3 times, not contain sequencial number more than 3.
Laravel SecurityCode

## Installation
Install the package by the following command,

composer require kdcwinner/securitycode

## Add Provider
Add the provider to your config/app.php into provider section if using lower version of laravel,

Kdcwinner\Securitycode\SecuritycodeServiceProvider::class,

## fire Migrate command
php artisan migrate

this command will add one column in users table with 'securitycode' name and create on table with 'configration' name.

Fire php artisan serve comand to start your application

then with url with http://127.0.0.1:8000/securitycode/configration 
Here you can set code length for example. 6 then code will generate with 6 digits, if you set 10 then code will generate with 10 digits.

After configure the code length you have to fire http://127.0.0.1:8000/securitycode/userlist

if you see a no data then insert some data in users table and then again fire this url show you will as button with name 'Assign Access Code' to assign code to that particular user.


## License
The MIT License (MIT). Please see <a href="/shailesh-ladumor/laravel-pwa/blob/master/LICENSE.md">License</a> File for more information