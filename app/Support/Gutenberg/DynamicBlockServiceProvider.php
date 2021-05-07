<?php

namespace App\Support\Gutenberg;

use ReflectionClass;
use App\Support\ServiceProvider;
use Symfony\Component\Finder\Finder;
use App\Support\Gutenberg\DynamicBlock;

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
class DynamicBlockServiceProvider extends ServiceProvider
{

    public function __construct()
    {
        /**
         * Autoload all blocks in the Blocks directory. This saves having to
         * manually add it to the block provider.
         */
        $this->load(get_template_directory() . '/app/Dynamic_Blocks');

        /**
         * Call the parent constructor to continue booting the provider.
         */
        parent::__construct();
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
            $block = 'App\\Dynamic_Blocks\\' . str_replace(
                ['/', '.php'],
                ['\\', ''],
                $block->getRelativePathname()
            );

            if (is_subclass_of($block, DynamicBlock::class) && !(new ReflectionClass($block))->isAbstract()) {
                new $block;
            }
        }
    }
}
