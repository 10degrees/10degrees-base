<?php

namespace App\Controllers\Web;

use App\Controllers\Abstractions\HandlesAjax;

/**
 * Example controler demonstrating usage of HandlesAjax base class
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class ExampleController extends HandlesAjax
{
    /**
     * The action specified by the ajax call
     *
     * @var string
     */
    protected $action = 'td_example_ajax_action';

    /**
     * Handle the ajax call to filter the Indeed job feed
     *
     * @param App\Request $request An AJAX request
     *
     * @return wp_send_json()
     */
    public function handle($request)
    {
        $post_parameter = $request->get('some_post_parameter');

        // Perform some logic here
        //phpcs:ignore
        return wp_send_json( td_view('partials/...', [
            'post_parameter' => $post_parameter
        ]));//phpcs:ignore
    }
}
