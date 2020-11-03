<?php

namespace App\Mail;

use App\Support\Mail\Mailer;
use WP_User;

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
     * The user
     *
     * @var \WP_User
     */
    protected $user;

    /**
     * Create a new message instance.
     *
     * @param \WP_User $user The user
     *
     * @return void
     */
    public function __construct(WP_User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return App\Support\Mail\Mailer
     */
    public function build(): Mailer
    {
        return $this->to($this->user)
            ->subject('User notified')
            ->view('partials.emails.notify');
    }
}
