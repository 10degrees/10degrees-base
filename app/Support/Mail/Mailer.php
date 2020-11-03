<?php

namespace App\Support\Mail;

/**
 * One central location to send all mail in the theme
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
abstract class Mailer
{
    /**
     * Sends an email
     *
     * @param string $email   Email to send to
     * @param string $subject Email subject line
     * @param string $message Email content
     *
     * @return bool
     */
    public function sendTo(string $email, string $subject, string $message): bool
    {
        return wp_mail($email, $subject, $message);
    }
}
