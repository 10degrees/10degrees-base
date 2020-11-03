<?php

namespace App\Mailer;

use App\Support\Mail\Mailer;
use WP_User;

/**
 * Concrete implementation of Mailer for sending email to users
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class UserMailer extends Mailer
{
    /**
     * Send an email notification
     *
     * @param \WP_User $user A WordPress user
     *
     * @return bool
     */
    public function notify(WP_User $user): bool
    {
        $subject = 'Some notifiation';
        $template = td_view('partials/emails/notify');

        return $this->sendTo($user->email(), $subject, $template);
    }
}
