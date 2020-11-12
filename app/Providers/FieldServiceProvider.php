<?php

namespace App\Providers;

use ReflectionClass;
use App\Support\ServiceProvider;
use App\ACF_Fields\AbstractFieldRegistration;
use Symfony\Component\Finder\Finder;

/**
 * Registers ACF fields
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class FieldServiceProvider extends ServiceProvider
{

    public function __construct()
    {
        /**
         * If ACF isn't loaded then bail.
         */
        if(!class_exists('ACF')){
            return;
        }

        /**
         * Autoload all field groups in the ACF_Fields directory. This saves having to
         * manually add it to the Field provider.
         */
        $this->load(get_template_directory() . '/app/ACF_Fields');

        /**
         * Call the parent constructor to continue booting the provider.
         */
        parent::__construct();
    }

    /**
     * Load field groups from the ACF_Fields directory
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

        foreach ((new Finder)->in($path)->files() as $field_group) {
            $field_group = 'App\\ACF_Fields\\' . str_replace(
                ['/', '.php'],
                ['\\', ''],
                $field_group->getRelativePathname()
            );

            if (is_subclass_of($field_group, AbstractFieldRegistration::class) && !(new ReflectionClass($field_group))->isAbstract()) {
                new $field_group;
            }
        }
    }
}
