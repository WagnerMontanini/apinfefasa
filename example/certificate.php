<?php
require __DIR__ . "/assets/config.php";
require __DIR__ . "/../vendor/autoload.php";

use WagnerMontanini\ApiNfeFasa\Certificates;


$certificates = new Certificates(
    "http://fasa_nfe.test/v1",
    "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9mYXNhX25mZS50ZXN0XC92MVwvYXV0aFwvdG9rZW4iLCJpYXQiOjE2MjU2NjQ2ODUsImV4cCI6MTYyNTc1MTA4NSwibmJmIjoxNjI1NjY0Njg1LCJqdGkiOiJyUXhaUGgzd1c4UFFnUlpTIiwic3ViIjoiMTg2NTM2ZjYtZjEzYy00MmY3LTgxNDItNWJhNDhjZmVkNGViIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.yQtXXalj03A-7xCwu-TFa83TE3wVD6o5iOBmIHW1Rvg",
    "71b1be22-68f9-4887-8597-914c035aa4ea"
);

/**
 * index
 */
echo "<h1>INDEX</h1>";
$index = $certificates->index(null);

if ($index->error()) {
    var_dump($index->error());
} else {
    var_dump($index->response());
}

/**
 * create
 */
echo "<h1>CREATE</h1>";

 $certificate = ($_FILES["certificate"] ?? null);
 $password = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);
 if (!empty($certificate) && !empty($password)) {    
    $create = $certificates->create([
        "certificate" => $certificate['tmp_name'],
        "password" => $password['password'],
    ]);
    
    if ($create->error()) {
        echo "<p class='error'>{$create->error()->message}</p>";
    } else {
        var_dump($create->response());
    }
 }
 ?>
     <form action="" method="post" enctype="multipart/form-data">
         <input type="file" name="certificate"/>
         <input type="password" name="password"/>
         <button>Enviar</button>
     </form>
 <?php
exit;
/**
 * READ
 */
echo "<h1>READ</h1>";

$read = $certificates->read("71b1be22-68f9-4887-8597-914c035aa4ea");

if ($read->error()) {
    echo "<p class='error'>{$read->error()->message}</p>";
} else {
    var_dump($read->response());
}

/**
 * DELETE
 */
echo "<h1>DELETE</h1>";

$delete = $certificates->delete("71b1be22-68f9-4887-8597-914c035aa4ea");

if ($delete->error()) {
    echo "<p class='error'>{$delete->error()->message}</p>";
} else {
    var_dump($delete->response());
}