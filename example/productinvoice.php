<?php
require __DIR__ . "/assets/config.php";
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

