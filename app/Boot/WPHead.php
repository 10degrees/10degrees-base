<?php

namespace App\Boot;

/**
  * Code that should be added inside the <head>
  *
  * @category Theme
  * @package  TenDegrees/10degrees-base
  * @author   10 Degrees <wordpress@10degrees.uk>
  * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
  * @link     https://github.com/10degrees/10degrees-base
  * @since    2.0.0
  */
class WPHead {
    /**
     * Constructor
     */
    public function __construct()
    {
        add_action('wp_head', [$this, 'xcloak'], 2);
    }

    /**
     * Add required styles for the x-cloak directive in Alpine JS
     *
     * @return  void
     */
    public function xcloak()
    {
        ?>
        <style>[x-cloak]{display:none !important;}</style>
        <?php
    }
}