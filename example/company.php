<?php
require __DIR__ . "/assets/config.php";
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