<?php

namespace App\Support\View;

class View
{
    /**
     * The view directory.
     *
     * @var string
     */
    protected $dir;

    /**
     * The view.
     *
     * @var string
     */
    protected $view;

    /**
     * Set the view directory.
     *
     * @param string $path
     *
     * @return void
     */
    public function __construct(string $path)
    {
        $this->dir = $path;
    }

    /**
     * Make a view.
     *
     * @param string $view
     * @param array $args
     *
     * @return self
     */
    public function make(string $view, array $args = []): self
    {
        $name = $this->normalizeName($view);

        $this->view = $this->get("{$this->dir}/{$name}.php", $args);

        return $this;
    }

    /**
     * Normaize the name (replace dot notation for slashes).
     *
     * @param string $path
     *
     * @return string
     */
    public function normalizeName(string $path): string
    {
        return str_replace('.', '/', $path);
    }

    /**
     * Get the view.
     *
     * @param string $path
     * @param array  $data
     *
     * @return string
     */
    public function get(string $path, array $data = []): string
    {
        return $this->evaluatePath($path, $data);
    }

    /**
     * Evaluate the view path.
     *
     * @param string $__path
     * @param array  $__data
     *
     * @return string
     */
    public function evaluatePath(string $__path, array $__data = []): string
    {
        ob_start();
        extract($__data, EXTR_SKIP);
        include $__path;
        return ltrim(ob_get_clean());
    }

    /**
     * Return the view.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->view;
    }
}
