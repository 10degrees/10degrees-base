<?php

namespace App\Config;

use App\Config\Environment;

/**
 * 
 * Add a global html header/footer around all emails generated by WordPress/plugins. 
 * 
 * Restrict dev emails to only be sent to mailtrap if not on production
 * 
 * Set from name/email
 * 
 */
class Mail 
{
    public function __construct()  
    {
        $this->environment = new Environment;

        $this->fire();
    }

    public function fire()
    {
        add_filter( 'wp_mail', [$this, 'addHeaderFooter'] );
        add_filter( 'wp_mail_content_type', [$this, 'setContentType'] );

        // add_filter( 'wp_mail_from', [$this, 'from_email'] );
        // add_filter( 'wp_mail_from_name', [$this, 'from_name'] );

        if (!$this->environment->isProduction()) 
        {
            add_action( 'phpmailer_init', [$this, 'configureMailtrap'] );
        }
    }

    /**
     * @return    string    The email address from which the newsletter is being sent.
     */
    public function from_email() 
    {
        return 'wordpress@10degrees.uk';
    }

    /**
     * @return    string    The name from which the newsletter is being sent.
     */
    public function from_name() 
    {
        return "10 Degrees";
    }

    /**
     * @param    PHPMailer    $phpmailer    A reference to the current instance of PHP Mailer
     */
    public function configureMailtrap( $phpmailer )
    {
        $phpmailer->isSMTP();
        $phpmailer->Host = 'smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = 'd8e12230a8931a';
        $phpmailer->Password = 'c6729d05b58b78';
    }

    /**
     * This globally adds a header and footer to all email templates. This includes emails generated 
     * by plugins and WP Core to keep things consistent. Comment out/remove if you don't want this.
     * 
     * @param array $args
     */
    public function addHeaderFooter( $args ) {
        
        $message = $this->emailHeader() . $args['message'] . $this->emailFooter();

        $new_wp_mail = array(
            'to'          => $args['to'],
            'subject'     => $args['subject'],
            'message'     => $message,
            'headers'     => $args['headers'],
            'attachments' => $args['attachments'],
        );
        
        return $new_wp_mail;
    }

    /**
     * Get the email header template
     * 
     * @return string
     */
    protected function emailHeader()
    {
        return td_view('partials/emails/_header');
    }

    /**
     * Get the email footer template
     * 
     * @return string
     */
    protected function emailFooter()
    {
        return td_view('partials/emails/_footer');
    }

    /**
     * Set the email conent type
     * 
     * @return string
     */
    public function setContentType()
    {
        return "text/html";
    }
    
}
