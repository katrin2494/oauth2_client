<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About Project

OAuth2 Client based on Laravel Socialite

## Technology Stack
- [Laravel 8](https://laravel.com/docs/8.x).
- [Laravel Socialite](https://laravel.com/docs/8.x/socialite).

## Deploy

Server requirements
- PHP ^7.4
- MySQL ^5.7
- nginx/apache

### Steps to install
- ``git clone https://github.com/katrin2494/oauth2_client.git``
- ``php artisan migrate``
- add configuration of Oauth2 Server to config/services.php
```
  'oauth' => [
    'client_id' => {oauth_client_id},
    'client_secret' => {oauth_client_secret},
    'redirect' => {oauth_server_url}
  ]
```
