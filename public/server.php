<?php

use Backend\Connection;

require __DIR__. '/../vendor/autoload.php';

echo json_encode('success');
$pdo = (new Connection())->getPdo();
var_dump($pdo);