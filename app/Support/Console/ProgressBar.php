<?php

namespace App\Support\Console;

use function WP_CLI\Utils\make_progress_bar as wpcli_make_progress_bar;

/**
 * Create a progress bar
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
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
     * @param integer $count The progress bar count
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
     * @param string $message The message to display
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
