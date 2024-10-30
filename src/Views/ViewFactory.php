<?php

declare(strict_types=1);

namespace App\Views;

use LogicException;

class ViewFactory
{
    protected string $basePath;

    public function __construct(string $basePath)
    {
        $this->basePath = realpath(rtrim($basePath, '/\\'));

        if (empty($this->basePath) || !is_dir($this->basePath)) {
            throw new LogicException(sprintf('Invalid ViewFactory base path %s', $basePath));
        }
    }

    public function create(string $layout)
    {
        $path = realpath(sprintf('%s/%s', $this->basePath, ltrim($layout, '/\\')));

        if (empty($path) || !file_exists($path) || !str_starts_with($path, $this->basePath)) {
            throw new LogicException(sprintf('Invalid layout %s', $layout));
        }

        return new View($path);
    }
}
