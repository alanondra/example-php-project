<?php

declare(strict_types=1);

namespace App\Database;

use PDO;

class ConnectionFactory
{
    /**
     * Construct a ConnectionFactory.
     *
     * @param string $driver
     *  Driver prefix.
     * @param string $host
     *  Database server hostname.
     * @param int $port
     *  Database server port.
     * @param string $schema
     *  Database schema.
     * @param string $username
     *  Database username.
     * @param string $password
     *  Database password.
     * @param ?string $charset
     *  Database character set.
     * @param array $options
     *  Database options.
     *
     * @see https://www.php.net/manual/en/book.pdo.php
     * @see https://www.php.net/manual/en/pdo.drivers.php
     */
    public function __construct(
        protected string $driver,
        protected string $host,
        protected int $port,
        protected string $schema,
        protected string $username,
        protected string $password,
        protected ?string $charset = 'utf8mb4',
        protected array $options = []
    ) {
        //
    }

    /**
     * Connect to the database.
     * @return \PDO
     * @throws \PDOException
     */
    public function create(): PDO
    {
        $dsn = $this->getConnectionString();

        return new PDO(
            $dsn,
            $this->username,
            $this->password,
            $this->getOptions()
        );
    }

    /**
     * Get the connection string.
     *
     * @return string
     */
    protected function getConnectionString(): string
    {
        $parts = [
            'host' => $this->host,
            'port' => $this->port,
            'dbname' => $this->schema,
        ];

        if (!empty($this->charset)) {
            $parts['charset'] = $this->charset;
        }

        return sprintf(
            '%s:%s',
            $this->driver,
            http_build_query($parts, arg_separator: ';')
        );
    }

    /**
     * Get the connection options.
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $defaults = [
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $required = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        return array_replace(
            $defaults,
            $this->options,
            $required
        );
    }
}
