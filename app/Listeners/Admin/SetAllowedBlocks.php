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
class SetAllowedBlocks
{
    /**
     * The event priority
     *
     * @var integer
     */
    public static $priority = 10;

    /**
     * Array of the allowed block types in the editor
     *
     * @var array
     */
    public $allowedBlocks = [
        'core/audio',
        'core/block', // Reusable Blocks
        'core/categories',
        'core/code',
        'core/columns',
        'core/cover',
        'core/embed',
        'core/file',
        'core/freeform',
        'core/gallery',
        'core/group',
        'core/heading',
        'core/html',
        'core/image',
        'core/list',
        'core/missing',
        'core/more',
        'core/media-text',
        'core/nextpage',
        'core/paragraph',
        'core/preformatted',
        'core/quote',
        'core/shortcode',
        'core/separator',
        'core/table',
        'core/video',
        'gravityforms/form',
        'map-block-leaflet/map-block-leaflet',
        // No ACF blocks? They are automatically added to the allowlist!
    ];

    /**
     * Handle an event
     *
     * @return mixed
     */
    public function handle()
    {
        return $this->allowedBlocks;
    }
}
