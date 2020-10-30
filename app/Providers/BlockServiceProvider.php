<?php

namespace App\Providers;

use App\Support\ServiceProvider;

/**
 * Registers blocks
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class BlockServiceProvider extends ServiceProvider
{
    /**
     * List the admin specific classes that need to be booted on every request
     *
     * @var array
     */
    protected $classes = [
        \App\Blocks\Testimonials::class,
        \App\Blocks\Accordion::class,
        \App\Blocks\SocialLinks::class,
        \App\Blocks\SocialShare::class,
    ];

    /**
     * Only boot the services if ACF is active
     */
    public function __construct()
    {
        if (!function_exists('acf_register_block_type')) {
            return;
        }

        parent::__construct();
    }
}
