<?php

namespace App\Support\Database;

use App\Support\ServiceProvider;
use Corcel\Database;

/**
 * Registers Custom post types
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * List the classes that need to be booted on every request
     *
     * @var array
     */
    protected $classes = [];

    /**
     * Create the database connection for eloquent models
     */
    public function __construct()
    {
        global $wpdb;

        Database::connect(
            [
                'database'  => DB_NAME,
                'username'  => DB_USER,
                'password'  => DB_PASSWORD,
                'host'      => DB_HOST,
                'prefix'    => $wpdb->prefix,
                'charset'   => DB_CHARSET,
                'collation' => DB_COLLATE ?: 'utf8_unicode_ci',
            ]
        );

        parent::__construct();
    }
}
