<?php

declare(strict_types=1);

return [
    'driver' => 'mysql',
    'host' => $_ENV['DB_HOST'] ?? 'localhost',
    'port' => (int) ($_ENV['DB_PORT'] ?? 3306),
    'schema' => $_ENV['DB_SCHEMA'] ?? 'example',
    'username' => $_ENV['DB_USERNAME'] ?? 'example',
    'password' => $_ENV['DB_PASSWORD'] ?? 'password',
    'charset' => 'utf8mb4',
    'options' => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ],
];
