<?php

namespace App\Inc;

/**
 * Service provider base class
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
abstract class ServiceProvider
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->call();
    }

    /**
     * Instantiate an instance of each class (service)
     *
     * @return void
     */
    public function call()
    {
        foreach ($this->classes as $class) {
            new $class;
        }
    }
}
