<?php

namespace App\Mail;

use App\Support\Mail\Mailer;

/**
 * Bulid an email
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class NotifyUser extends Mailer
{
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        # code...
    }

    /**
     * Build the message.
     *
     * @return App\Support\Mail\Mailer
     */
    public function build(): Mailer
    {
        return $this->subject('User notified')->view('partials.emails.notify');
    }
}
