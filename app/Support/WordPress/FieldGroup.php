<?php

namespace App\Support\WordPress;

/**
 * Field Group
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
abstract class FieldGroup
{
    /**
     * ACF fields to register. Overriden in extending class.
     *
     * @var array
     */
    protected $fields = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group($this->fields);
        }
    }
}
