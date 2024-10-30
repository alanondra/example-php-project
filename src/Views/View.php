<?php

declare(strict_types=1);

namespace App\Views;

class View
{
    /**
     * Construct a View.
     * @param string $path
     */
    public function __construct(protected string $path)
    {
        //
    }

    /**
     * Start the output buffer.
     * @return static
     */
    public function start(): static
    {
        ob_start();

        return $this;
    }

    /**
     * End the output buffer, rendering it as the View's content.
     * @return static
     */
    public function end(): static
    {
        $content = ob_get_clean();

        include $this->path;

        return $this;
    }
}
