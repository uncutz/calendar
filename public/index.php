<?php

use Backend\Controller\EntryController;
use Backend\Controller\EntryStorageController;

require __DIR__ . '/../vendor/autoload.php';

$path = $_SERVER['REQUEST_URI'];


try {

    if ($path === '/') {
        require __DIR__ . '/renderCalendar.php';
    }

    if ($path === '/save') {
        (new EntryStorageController())->save();
    }

    if ($path === '/allEntries') {
        (new EntryController())->index();
    }

} catch (Exception $exception) {
    var_dump($exception);
}


