<?php

//@TODO TODO-PSR2 this file declares symbols & has side effects
namespace App\Boot;

//function td_template_path() {
//    return BaseWrapper::$main_template;
//}

/**
 * Theme wrapper
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @link     http://roots.io/an-introduction-to-the-roots-theme-wrapper/
 * @link     http://scribu.net/wordpress/theme-wrappers.html
 * @since    2.0.0
 */
class BaseWrapper
{
    // Stores the full path to the main template file
    static $main_template;

    // Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
    static $base;

    /**
     * Constructor
     *
     * @param string $template Template slug
     */
    public function __construct($template = 'base.php')
    {
        $this->slug = basename( $template, '.php' );
        $this->templates = array( $template );
        if (self::$base) {
            $str = substr( $template, 0, -4 );
            array_unshift( $this->templates, sprintf( $str . '-%s.php', self::$base ) );
        }
    }

    /**
     * String representation
     *
     * @return string
     */
    public function __toString()
    {
        $this->templates = apply_filters('roots/wrap_' . $this->slug, $this->templates);
        return locate_template($this->templates);
    }

    //@TODO check what this function does
    /**
     * Wraps
     *
     * @param [type] $main Insert comment
     *
     * @return BaseWrapper
     */
    static function wrap($main)
    {
        self::$main_template = $main;
        self::$base = basename(self::$main_template, '.php');
        if ('index' === self::$base) {
              self::$base = false;
        }
        return new BaseWrapper();
    }
}

add_filter('template_include', array( 'App\Boot\BaseWrapper', 'wrap' ), 99);
