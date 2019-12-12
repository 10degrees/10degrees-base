<?php

namespace App\ACF_Blocks;

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
abstract class AbstractBlockRegistration
{
    /**
     * Constructor
     *
     * Only register the class if ACF is active
     */
    public function __construct()
    {
        if (function_exists('acf_register_block_type')) {
            $this->register();
        }
    }
}
