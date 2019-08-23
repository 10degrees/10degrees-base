<?php

namespace App\Config;

use App\Config\Environment;

class Queue
{
	public function __construct()
	{
        $this->environment = new Environment;

		add_filter( 'wp_queue_default_connection', [$this, 'connection']);

		add_action('init', [$this, 'setUpTables']);

		add_action('init', [$this, 'cron']);
	}

	/**
	 * 
	 * Maybe set up the db tables for queues
	 * 
	 */
	public function setUpTables()
	{
	    if(isset($_GET['create-queue-tables'])) {
	    	wp_queue_install_tables();
	    }
	}

	/**	
	 * Set the queue connection
	 * 
	 * @param  string $connection: default is 'database'
	 * @return string
	 */
	public function connection($connection)
	{
		if (!$this->environment->isProduction()) {
			return 'sync';
		}

		return $connection;
	}

	/**	
	 * Schedule cron
	 * 
	 * @return void
	 */
	public function cron()
	{
		wp_queue()->cron();
	}
}