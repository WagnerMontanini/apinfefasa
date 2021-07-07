# ApiNfeFasa Library Test

[![Maintainer](http://img.shields.io/badge/maintainer-@wagnermontanini-blue.svg?style=flat-square)](https://www.linkedin.com/in/wagner-montanini)
[![Source Code](http://img.shields.io/badge/source-wagnermontanini/apinfefasa-blue.svg?style=flat-square)](https://github.com/wagnermontanini/apinfefasa)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/wagnermontanini/apinfefasa.svg?style=flat-square)](https://packagist.org/packages/wagnermontanini/apinfefasa)
[![Latest Version](https://img.shields.io/github/release/wagnermontanini/apinfefasa.svg?style=flat-square)](https://github.com/wagnermontanini/apinfefasa/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/wagnermontanini/apinfefasa.svg?style=flat-square)](https://scrutinizer-ci.com/g/wagnermontanini/apinfefasa)
[![Quality Score](https://img.shields.io/scrutinizer/g/wagnermontanini/apinfefasa.svg?style=flat-square)](https://scrutinizer-ci.com/g/wagnermontanini/apinfefasa)
[![Total Downloads](https://img.shields.io/packagist/dt/wagnermontanini/apinfefasa.svg?style=flat-square)](https://packagist.org/packages/cwagnermontanini/apinfefasa)

###### ApiNfeFasa Library is a small set of classes developed for integration with the ApiNfeFasa platform webservice.

ApiNfeFasa Library é um pequeno conjunto de classes desenvolvidas para integração ao webservice da plataforma ApiNfeFasa.

Você pode saber mais **[clicando aqui](https://fasainformatica.com.br)**.

### Highlights

- Simple installation (Instalação simples)
- Abstraction of all API methods (Abstração de todos os métodos da API)
- Easy authentication with login and password (Fácil autenticação com Token)
- Composer ready and PSR-2 compliant (Pronto para o composer e compatível com PSR-2)

## Installation

Uploader is available via Composer:

```bash
"wagnermontanini/apinfefasa": "^1.1"
```

or run

```bash
composer require wagnermontanini/apinfefasa
```

## Documentation

###### For details on how to use, see a sample folder in the component directory. In it you will have an example of use for each class. It works like this:

Para mais detalhes sobre como usar, veja uma pasta de exemplo no diretório do componente. Nela terá um exemplo de uso para cada classe. Ele funciona assim:

#### PRODUTOINVOICES endpoint:

```php
<?php
require __DIR__ . "/../vendor/autoload.php";

use WagnerMontanini\ApiNfeFasa\ProductInvoices;

$invoices = new ProductInvoices(
    "http://fasa_nfe.test/v1",
    "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvbmZlLmZhc2FpbmZvcm1hdGljYS5jb20uYnJcL3YxXC9hdXRoXC90b2tlbiIsImlhdCI6MTYyNTQ5MTQyOSwiZXhwIjoxNjI1NTc3ODI5LCJuYmYiOjE2MjU0OTE0MjksImp0aSI6InJPbXVORU5JUk1BSUkzb20iLCJzdWIiOiJkYzU4ZGMwNS00MDUyLTQ4ZjgtYTU4OS01ZTIwMjllMzRmYzkiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.58K2S3ApGsgpgX56Ldto3pTKg9V2Mo2tEVkZd1jIuh0",
    "71b1be22-68f9-4887-8597-914c035aa4ea"
);

/**
 * READ 
 */
echo "<h1>READ</h1>";

$invoice = $invoices->read("35123456789123456789123456789123456789123456");

if ($invoice->error()) {
    echo "<p class='error'>{$invoice->error()->message}</p>";
} else {
    $invoiceData = $invoice->response()->data;
    var_dump(
        $invoiceData
    );
}

```

#### ACCOUNTS endpoint:

```php
<?php
require __DIR__ . "/../vendor/autoload.php";

use WagnerMontanini\ApiNfeFasa\Me;

$me = new Me(
    "http://fasa_nfe.test/v1"
);

/**
 * register
 */
echo "<h1>Register</h1>";

$user = $me->register(array(
    "name"=> "Fasa Informatica LTDA",
    "email"=> "fasa@fasainformatica.com.br",
    "cnpj"=> "18349966000102",
    "tax_regime"=> "none",
    "password"=> "123456789",
    "address"=> [
        "postal_code"=> "18520000",
        "street"=> "Rua Teste",
        "number"=> "120",
        "district"=> "centro",
        "city_code"=> "3511508"
    ]
));
var_dump($user->response());

/**
 * login
 */
 echo "<h1>Login</h1>";

 $user = $me->auth("fasa@fasainformatica.com.br","123456789");
 var_dump($user->response());
 var_dump($user->error());

/**
 * me
 */
echo "<h1>ME</h1>";

$user = $me->me();
var_dump($user->response());

/**
 * logout
 */
 echo "<h1>Logout</h1>";

 $user = $me->logout();
 var_dump($user->response());

```

#### COMPANIES endpoint:

```php
<?php
require __DIR__ . "/../vendor/autoload.php";

use WagnerMontanini\ApiNfeFasa\Companies;

$companies = new Companies(
    "http://fasa_nfe.test/v1",
    "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvbmZlLmZhc2FpbmZvcm1hdGljYS5jb20uYnJcL3YxXC9hdXRoXC90b2tlbiIsImlhdCI6MTYyNTQ5MTQyOSwiZXhwIjoxNjI1NTc3ODI5LCJuYmYiOjE2MjU0OTE0MjksImp0aSI6InJPbXVORU5JUk1BSUkzb20iLCJzdWIiOiJkYzU4ZGMwNS00MDUyLTQ4ZjgtYTU4OS01ZTIwMjllMzRmYzkiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.58K2S3ApGsgpgX56Ldto3pTKg9V2Mo2tEVkZd1jIuh0"
);

/**
 * index
 */
echo "<h1>INDEX</h1>";
$index = $companies->index(null);

if ($index->error()) {
    var_dump($index->error());
} else {
    var_dump($index->response());
}

/**
 * create
 */
echo "<h1>CREATE</h1>";

$create = $companies->create([
    "name"=> "Fasa Informatica LTDA",
    "trade_name"=> "Fasa Informatica",
    "email"=> "fasa@fasainformatica.com.br",
    "cnpj"=> "18349966000102",
    "tax_regime"=> "none",
    "address"=> [
        "postal_code"=> "18520000",
        "street"=> "Rua Teste",
        "number"=> "120",
        "district"=> "centro",
        "city_code"=> "3511508" ]
]);

if ($create->error()) {
    echo "<p class='error'>{$create->error()->message}</p>";
} else {
    var_dump($create->response());
}

/**
 * READ
 */
echo "<h1>READ</h1>";

$read = $companies->read("71b1be22-68f9-4887-8597-914c035aa4ea");

if ($read->error()) {
    echo "<p class='error'>{$read->error()->message}</p>";
} else {
    var_dump($read->response());
}

/**
 * UPDATE
 */
echo "<h1>UPDATE</h1>";

$update = $companies->update("71b1be22-68f9-4887-8597-914c035aa4ea", [
    "name"=> "Fasa Informatica LTDA",
    "trade_name"=> "Fasa Informatica",
    "email"=> "fasa@fasainformatica.com.br",
    "cnpj"=> "18349966000102",
    "tax_regime"=> "none",
    "address"=> [
        "postal_code"=> "18520000",
        "street"=> "Rua Teste",
        "number"=> "120",
        "district"=> "centro",
        "city_code"=> "3511508" ]
    ]);

if ($update->error()) {
    echo "<p class='error'>{$update->error()->message}</p>";
} else {
    var_dump($update->response());
}

/**
 * DELETE
 */
echo "<h1>DELETE</h1>";

$delete = $companies->delete("71b1be22-68f9-4887-8597-914c035aa4ea");

if ($delete->error()) {
    echo "<p class='error'>{$delete->error()->message}</p>";
} else {
    var_dump($delete->response());
}

```

## Contributing

Please see [CONTRIBUTING](https://github.com/wagnermontanini/apinfefasa/blob/master/CONTRIBUTING.md) for details.

## Support

###### Security: If you discover any security related issues, please email wagnermontanini@hotmail.com.br instead of using the issue tracker.

Se você descobrir algum problema relacionado à segurança, envie um e-mail para wagnermontanini@hotmail.com.br em vez de usar o rastreador de problemas.

Thank you

## Credits

- [Wagner Montanini](https://github.com/wagnermontanini) (Developer)
- [All Contributors](https://github.com/wagnermontanini/apinfefasa/contributors) (This Rock)

## License

The MIT License (MIT). Please see [License File](https://github.com/wagnermontanini/apinfefasa/blob/master/LICENSE) for more information.