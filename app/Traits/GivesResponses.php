<?php

namespace App\Traits;

/**
 * A trait for objects that give reponses
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
trait GivesResponses
{
    /**
     * Send a JSON Response
     *
     * @param mixed  $response A response
     * @param string $code     A HTTP response code
     *
     * @return wp_send_json
     */
    protected function responseJson($response, $code = '200')
    {
        return wp_send_json($response, $code);
    }
}
