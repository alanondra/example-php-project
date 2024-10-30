<?php

$config = require BASE_DIR . '/etc/config/db.php';

return new App\Database\ConnectionFactory(
    $config['driver'],
    $config['host'],
    $config['port'],
    $config['schema'],
    $config['username'],
    $config['password'],
    $config['charset'],
    $config['options']
);
