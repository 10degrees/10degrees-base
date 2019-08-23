<?php

namespace App\Mailer;

/**
*
* One central location to send all mail in the theme
* 
*/
abstract class Mailer
{	
	public function sendTo($email, $subject, $message)
	{
		wp_mail($email, $subject, $message);
	}
}