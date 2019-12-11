<?php

namespace App\Config;

use App\Config\Environment;

/**
 * Queues requests
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class Queue
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->environment = new Environment;
        add_filter('wp_queue_default_connection', [$this, 'connection']);
        add_action('init', [$this, 'setUpTables']);
        add_action('init', [$this, 'cron']);
    }

    /**
     * Maybe set up the db tables for queues
     *
     * @return void
     */
    public function setUpTables()
    {
        if (isset($_GET['create-queue-tables'])) {
            wp_queue_install_tables();
        }
    }

    //@TODO check logic for default value
    /**
     * Set the queue connection
     *
     * @param string $connection : default is 'database'
     *
     * @return string $connection
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
