<?php
require __DIR__ . "/assets/config.php";
require __DIR__ . "/../vendor/autoload.php";

use WagnerMontanini\ApiNfeFasa\ProductInvoices;

$invoices = new ProductInvoices(
    "http://fasa_nfe.test/v1",
    "fasa@fasainformatica.com.br",
    "123456789",
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

