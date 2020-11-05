<?php

namespace App\Models;

use Corcel\Model\Post as Model;

/**
 * Extend an eloquent model
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class Testimonial extends Model
{
    /**
     * The name of the post type
     *
     * @var string
     */
    protected $postType = 'testimonial';
}
