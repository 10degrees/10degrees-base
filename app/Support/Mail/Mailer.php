<?php

namespace App\Support\Mail;

use WP_User;

/**
 * The base Mailer class
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
     * The email addresses
     *
     * @var array
     */
    protected $to = [];

    /**
     * The email subject
     *
     * @var string
     */
    protected $subject = '';

    /**
     * The email body
     *
     * @var string
     */
    protected $message = '';

    /**
     * The headers to send with the email
     *
     * @var array
     */
    protected $headers = [];

    /**
     * Any email attachments
     *
     * @var array
     */
    protected $attachments = [];

    /**
     * Send the email to multiple recipients
     *
     * @param array $emails The email addresses or users
     *
     * @return App\Support\Mail\Mailer
     */
    public function toAll(array $emails): Mailer
    {
        foreach ($emails as $email) {
            $this->to($email);
        }
        return $this;
    }

    /**
     * Set a recipient
     *
     * @param \WP_User|string $user The user or email address
     *
     * @return App\Support\Mail\Mailer
     */
    public function to($user): Mailer
    {
        $this->to[] = $this->resolveEmailAddress($user);

        return $this;
    }
    /**
     * Resolve the email address from a user
     *
     * @param \WP_User|string $user The user to resolve
     *
     * @return void
     */
    protected function resolveEmailAddress($user)
    {
        if ($user instanceof WP_User) {
            return $this->formatEmailAddress(
                $user->user_email,
                $user->user_nicename ?? ''
            );
        }
        return $user;
    }

    /**
     * Return a formatted email string
     *
     * @param string $email The user email
     * @param string $name  The user name
     *
     * @return string
     */
    public function formatEmailAddress(string $email, string $name = ''): string
    {
        return "{$name} <{$email}>";
    }

    /**
     * Set the Cc header
     *
     * @param \WP_User|string $user The user or email address
     *
     * @return App\Support\Mail\Mailer
     */
    public function cc($user): Mailer
    {
        $email = $this->resolveEmailAddress($user);

        return $this->header("Cc: {$email}");
    }

    /**
     * Set the Bcc header
     *
     * @param \WP_User|string $user The user or email address
     *
     * @return App\Support\Mail\Mailer
     */
    public function bcc($user): Mailer
    {
        $email = $this->resolveEmailAddress($user);

        return $this->header("Bcc: {$email}");
    }

    /**
     * Set the From and Reply-To headers
     *
     * @param \WP_User|string $user The user or email address
     *
     * @return App\Support\Mail\Mailer
     */
    public function from($user): Mailer
    {
        $email = $this->resolveEmailAddress($user);

        return $this->header("From: {$email}")->header("Reply-To: {$email}");
    }

    /**
     * Set the email subject
     *
     * @param string $subject The email subject
     *
     * @return void
     */
    public function subject(string $subject): Mailer
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Set the email message
     *
     * @param string $message The email message
     *
     * @return App\Support\Mail\Mailer
     */
    public function message(string $message): Mailer
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Set the email message with a view
     *
     * @param string $path The view path
     * @param array  $data The view data
     *
     * @return App\Support\Mail\Mailer
     */
    public function view(string $path, array $data = []): Mailer
    {
        $this->header('Content-Type: text/html; charset=UTF-8');

        $this->message = view($path, $data);

        return $this;
    }

    /**
     * Set a header
     *
     * @param string $header The header to set
     *
     * @return App\Support\Mail\Mailer
     */
    public function header(string $header): Mailer
    {
        $this->headers[] = $header;

        return $this;
    }

    /**
     * Set multiple headers
     *
     * @param array $headers The headers to set
     *
     * @return App\Support\Mail\Mailer
     */
    public function headers(array $headers): Mailer
    {
        foreach ($headers as $header) {
            $this->header($header);
        }

        return $this;
    }

    /**
     * Set an attachment to the email
     *
     * @param string $filepath The attachment filepath
     *
     * @return App\Support\Mail\Mailer
     */
    public function attachment(string $filepath): Mailer
    {
        $this->attachments[] = $filepath;

        return $this;
    }

    /**
     * Set attachments to the email
     *
     * @param array $filepaths The attachment filepaths
     *
     * @return App\Support\Mail\Mailer
     */
    public function attachments(array $filepaths): Mailer
    {
        foreach ($filepaths as $filepath) {
            $this->attachment($filepath);
        }

        return $this;
    }

    /**
     * Build the email
     *
     * @return App\Support\Mail\Mailer
     */
    public function build(): Mailer
    {
        return $this;
    }

    /**
     * Build and send an email
     *
     * @return boolean
     */
    public function send(): bool
    {
        $this->build();

        return wp_mail(
            $this->to,
            $this->subject,
            $this->message,
            $this->headers,
            $this->attachments
        );
    }
}
