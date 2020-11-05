<?php

namespace App\Support\WordPress;

use ReflectionClass;
use App\Support\ServiceProvider;
use App\Support\WordPress\Block;
use Symfony\Component\Finder\Finder;

/**
 * Registers blocks
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class BlockServiceProvider extends ServiceProvider
{
    /**
     * Only boot the services if ACF is active
     */
    public function __construct()
    {
        /**
         * If ACF isn't loaded then bail.
         */
        if (!function_exists('acf_register_block_type')) {
            return;
        }

        /**
         * Add a custom block category to keep custom blocks together.
         */
        add_filter('block_categories', [$this, 'addBlockCategory']);

        /**
         * Autoload all blocks in the Blocks directory. This saves having to
         * manually add it to the block provider.
         */
        $this->load(get_template_directory() . '/app/Blocks');

        /**
         * Call the parent constructor to continue booting the provider.
         */
        parent::__construct();
    }

    /**
     * Add a block category to show what blocka are custom
     *
     * @param array $categories The block categories
     *
     * @return array
     */
    public function addBlockCategory(array $categories): array
    {
        $categories[] = [
            'slug'  => 'theme',
            'title' => __('@theme', '@textdomain'),
        ];
        return $categories;
    }

    /**
     * Load blocks from the block directory
     *
     * @param string $path The directory paths to load
     *
     * @return void
     */
    protected function load(string $path): void
    {
        if (!is_dir($path)) {
            return;
        }

        foreach ((new Finder)->in($path)->files() as $block) {
            $block = 'App\\Blocks\\' . str_replace(
                ['/', '.php'],
                ['\\', ''],
                $block->getRelativePathname()
            );

            if (is_subclass_of($block, Block::class) && !(new ReflectionClass($block))->isAbstract()) {
                new $block;
            }
        }
    }
}
