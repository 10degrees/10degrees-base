<?php

namespace App\Mailer;

use App\Mailer\Mailer;

class UserMailer extends Mailer
{
	public function notify($user)
	{
		$subject = 'Some notifiation';

		$template = td_view('partials/emails/notify');

		return $this->sendTo( $user->email(), $subject, $template);
	}
}