<?php

namespace App\Controllers\Abstractions;

use App\Traits\RedirectsUsers;
use App\Traits\ValidatesRequests;

/**
 * Base class for registering actions
 * Wrapper for add_action
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
abstract class RegistersActions
{
    use RedirectsUsers, ValidatesRequests;

    /**
     * The action passed from the ajax call
     *
     * @var string|false
     */
    protected $action = false;

    protected $priority = 10;

    protected $args = 1;

    /**
     * Register the ajax actions if the extending class provides the action property
     */
    public function __construct()
    {
        if ($this->action) {
            add_action($this->action, [$this, 'handle'], $this->priority, $this->args);
        }
    }
}
