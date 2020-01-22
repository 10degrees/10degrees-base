<?php

namespace App\Admin;

/**
 * Whitelist the blocks available in the Gutenberg editor
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class WhitelistBlocks
{
    /**
     * Array of the allowed block types in the editor
     *
     * @var array
     */
    public $allowedBlocks = [
        'core/audio',
        'core/block',
        'core/categories',
        'core/code',
        'core/columns',
        'core/cover',
        'core-embed/twitter',
        'core-embed/youtube',
        'core-embed/facebook',
        'core-embed/instagram',
        'core-embed/vimeo',
        'core/file',
        'core/freeform',
        'core/gallery',
        'core/group',
        'core/heading',
        'core/html',
        'core/image',
        'core/list',
        'core/more',
        'core/media-text',
        'core/nextpage',
        'core/paragraph',
        'core/preformatted',
        'core/quote',
        'core/shortcode',
        'core/separator',
        'core/spacer',
        'core/table',
        'core/video',
        'custom-blocks/link-button',
        'acf/accordion',
        'acf/social-links',
        'acf/social-share',
        'acf/testimonials',
        'gravityforms/form',
        'map-block-leaflet/map-block-leaflet',
        'core/missing'
    ];

    /**
     * Constructor
     */
    public function __construct()
    {
        add_filter('allowed_block_types', [$this, 'setAllowedBlocks']);
    }

    /**
     * Set the blocks allowed in the editor
     *
     * @param array/bool $allowed_blocks Array of allowed block types or true/false to enable/disable blocks
     *
     * @return array                   Array of allowed blocks
     */
    public function setAllowedBlocks($allowed_blocks)
    {
        return $this->allowedBlocks;
    }
}