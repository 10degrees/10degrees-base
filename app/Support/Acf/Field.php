<?php

namespace App\Support\Acf;

/**
 * AbstractFieldRegistration
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
abstract class Field
{
    /**
     * Determine whether to wrap the field registration in an init action
     *
     * @var boolean
     */
    protected static bool $useInitAction = false;

    /**
     * init action to use if useInitAction is true
     *
     * @var string
     */
    protected static string $initAction = 'init';

    /**
     * Constructor
     */
    public function __construct()
    {
        if (function_exists('acf_add_local_field_group')) {
            if (static::$useInitAction) {
                add_action(static::$initAction, function () {
                    acf_add_local_field_group($this->fields());
                });
            } else {
                acf_add_local_field_group($this->fields());
            }
        }
    }

    /**
     * Get the fields
     *
     * @return array
     */
    abstract protected function fields(): array;
}
