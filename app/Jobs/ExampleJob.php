<?php

namespace App\Jobs;

use WP_Queue\Job;

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
     * @param mizxed $parameter
     */
    public function __construct( $parameter )
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