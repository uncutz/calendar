<?php

use Backend\Connection;

require __DIR__. '/../vendor/autoload.php';


$pdo = (new Connection())->getPdo();
var_dump($pdo);

echo json_encode('success');