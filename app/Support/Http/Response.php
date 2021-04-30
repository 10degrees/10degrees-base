<?php

namespace App\Support\Http;

/**
 * Response class
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class Response
{
    /**
     * An array of headers to send with the response
     *
     * @var array
     */
    protected $headers = [];

    /**
     * The response body
     *
     * @var string
     */
    protected $content;

    /**
     * Set the content
     *
     * @param string $content The response body
     *
     * @return self
     */
    public function content(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Set a header
     *
     * @param string $key   The header key
     * @param string $value The header value
     *
     * @return self
     */
    public function header(string $key, string $value): self
    {
        $this->headers[$key] = $value;

        return $this;
    }

    /**
     * Set a view as the response
     *
     * @param string $view The view name
     * @param array  $args The arguments to pass to the view
     *
     * @return self
     */
    public function view(string $view, array $args = []): self
    {
        return $this->content(view($view, $args));
    }

    /**
     * Return a json response
     *
     * @param mixed $data The data to JSON encode
     *
     * @return self
     */
    public function json($data): self
    {
        $this->header('Content-Type', 'application/json');

        $this->content = json_encode($data);

        return $this;
    }

    /**
     * Send the response
     *
     * @return void
     */
    public function send(): void
    {
        foreach ($this->headers as $key => $value) {
            header("{$key}: $value");
        }
        die($this->content);
    }

    /**
     * Send the response as a string
     *
     * @return string
     */
    public function __toString()
    {
        $this->send();
    }
}
