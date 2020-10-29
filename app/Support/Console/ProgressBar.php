<?php

namespace App\Support\Console;

use function WP_CLI\Utils\make_progress_bar as wpcli_make_progress_bar;

class ProgressBar
{
    /**
     * The progress bar count
     *
     * @var integer
     */
    protected $count = 0;

    /**
     * The progress bar message
     *
     * @var string
     */
    protected $message = '';

    /**
     * Assign the count
     *
     * @param integer $count
     *
     * @return void
     */
    public function __construct(int $count)
    {
        $this->count = $count;
    }

    /**
     * Set a progress bar message.
     *
     * @param string $message
     *
     * @return \App\Support\Console\ProgressBar
     */
    public function setMessage(string $message): ProgressBar
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Start the progressbar
     *
     * @return \App\Support\Console\ProgressBar
     */
    public function start(): ProgressBar
    {
        $this->bar = wpcli_make_progress_bar($this->message, $this->count);

        return $this;
    }

    /**
     * Increment the progress bar
     *
     * @return void
     */
    public function advance(): void
    {
        $this->bar->tick();
    }
    /**
     * Finish the progressbar
     *
     * @return void
     */
    public function finish(): void
    {
        $this->bar->finish();
    }
}
