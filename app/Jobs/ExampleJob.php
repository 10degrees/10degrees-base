<?php

namespace App\Jobs;

use WP_Queue\Job;

/**
 * Example usage of the Job base class
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class ExampleJob extends Job
{
    /**
     * Define your parameters
     *
     * @var mixed
     */
    protected $parameter;

    /**
     * Accept the parameters required for the job
     *
     * @param mixed $parameter Job parameters
     */
    public function __construct($parameter)
    {
        $this->parameter = $parameter;
    }

    /**
     * Handle the queued job
     *
     * @return void
     */
    public function handle()
    {
        // Do your queued job
    }
}
