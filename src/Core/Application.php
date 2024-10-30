<?php

declare(strict_types=1);

namespace App\Core;

use PDO;
use App\Views\{
    ViewFactory,
    View
};
use App\Database\ConnectionFactory;

class Application
{
    protected PDO $db;

    /**
     * Construct an Application.
     *
     * @param \App\Views\ViewFactory $viewFactory
     * @param \App\Database\ConnectionFactory $connectionFactory
     */
    public function __construct(
        protected ViewFactory $viewFactory,
        protected ConnectionFactory $connectionFactory
    ) {
        //
    }

    /**
     * Get a View at the given location.
     *
     * @param string $layout
     *
     * @return \App\Views\View
     */
    public function view(string $layout): View
    {
        $view = $this->viewFactory->create($layout);

        return $view;
    }

    public function db(): PDO
    {
        $this->db ??= $this->connectionFactory->create();

        return $this->db;
    }
}
