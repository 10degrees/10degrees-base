<?php

namespace App\Inc;

/**
 * Singleton
 *
 * PHP version 7.2
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 **/
abstract class Singleton
{
    private static $instances = array();

    /**
     * Returns an instance of the class
     *
     * @return object
     */
    public static function getInstance()
    {
        $class = get_called_class();
    
        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new $class();
        }
    
        return self::$instances[$class];
    }
}
