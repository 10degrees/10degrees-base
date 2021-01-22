<?php

namespace App\Support\WordPress;

/**
 * Registers a CPT
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
abstract class Cpt
{
    /**
     * Constructor
     */
    public function __construct()
    {
        add_action('init', [$this, 'register']);
    }

    /**
     * Register the post type and taxonomies
     *
     * @return void
     */
    public function register()
    {
        $this->registerPostType();

        if (method_exists($this, 'registerTaxonomies')) {
            call_user_func([$this, 'registerTaxonomies']);
        }
    }

    /**
     * Register the post type
     *
     * @return void
     */
    abstract public function registerPostType();
}
