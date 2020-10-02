<?php

use DxMonkey\Tiny;

require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$tiny = new Tiny();