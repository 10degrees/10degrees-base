<?php

namespace App\Support\WordPress;

/**
 * Abstract block registration
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
abstract class Block
{
    /**
     * Constructor
     *
     * Only register the class if ACF is active
     */
    public function __construct()
    {
        $this->register();
    }

    /**
     * Register the block
     *
     * @return void
     */
    abstract public function register();
}
