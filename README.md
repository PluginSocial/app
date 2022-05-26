<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About PluginSocial

**PluginSocial** é um aplicativo que permite interações entre redes sociais, isso é apenas a ponta do iceberg!

## Learning PluginSocial

- See documentation App
- See documentation API

## PluginSocial Sponsors

We would like to extend our thanks to the following sponsors for funding **PluginSocial** development. If you are interested in becoming a sponsor, please visit the PluginSocial.

### Installation

Instalando dependências

````shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer update --ignore-platform-reqs
````

````shell
cp .env.example .env
````

````shell
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
````

````shell
sail up --build -d --no-cache
````

````shell
sail artisan key:generate
````

````shell
sail artisan migrate --seed
````

````shell
sail npm install
````

````shell
sail npm run dev
````














## Contributing

Thank you for considering contributing to the PluginSocial! The contribution guide can be found in the.

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
