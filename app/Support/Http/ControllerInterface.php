<?php

namespace App\Support\Http;

use App\Support\Http\Request;

/**
 * The controller interface
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
interface ControllerInterface
{
    /**
     * Handle the request
     *
     * @param App\Support\Http\Request $request The request object
     *
     * @return mixed
     */
    public function handle(Request $request);
}
