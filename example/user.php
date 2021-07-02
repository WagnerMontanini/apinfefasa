<?php
require __DIR__ . "/assets/config.php";
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

