<?php

require_once '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(BASE_DIR);
$dotenv->load();

$views = require 'views.php';
$db = require 'db.php';

return new App\Core\Application(
    $views,
    $db
);
