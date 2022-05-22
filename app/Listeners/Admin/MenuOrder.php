<?php

namespace App\Listeners\Admin;

/**
 * Handle the event listener
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class MenuOrder
{
    /**
     * The event priority
     *
     * @var integer
     */
    public static $priority = 10;

    /**
     * Handle an event
     *
     * @return mixed
     */
    public function handle()
    {
        return [
            'index.php',
            'separator1',
            'wpengine-common',
            'edit.php',
            'edit-comments.php',
            'edit.php?post_type=page',
            'edit.php?post_type=student',
            'separator1',
            'upload.php', //media
            'users.php', //users
            'plugins.php', //plugins
            'separator-last',
            'themes.php', //appearance
            'tools.php', //tools
            'options-general.php', //WordPress options
            'acf-options-site-settings',
        ];
    }
}
