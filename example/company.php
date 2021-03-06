<?php
require __DIR__ . "/assets/config.php";
require __DIR__ . "/../vendor/autoload.php";

use WagnerMontanini\ApiNfeFasa\Companies;


$companies = new Companies(
    "http://fasa_nfe.test/v1",
    "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9mYXNhX25mZS50ZXN0XC92MVwvYXV0aFwvdG9rZW4iLCJpYXQiOjE2MjU2NjQ2ODUsImV4cCI6MTYyNTc1MTA4NSwibmJmIjoxNjI1NjY0Njg1LCJqdGkiOiJyUXhaUGgzd1c4UFFnUlpTIiwic3ViIjoiMTg2NTM2ZjYtZjEzYy00MmY3LTgxNDItNWJhNDhjZmVkNGViIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.yQtXXalj03A-7xCwu-TFa83TE3wVD6o5iOBmIHW1Rvg",
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