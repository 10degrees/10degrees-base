<?php

namespace App\Boot;

/**
 *
 * Simple realtime search and replace before WordPress serves up the template to the browser.
 * 
 */
class RealtimeFindAndReplace
{
    /**
     * 
     * Strings you would like to search and replace for.
     * 
     */
    protected $phrasesToReplace = [
        // 'search' => 'Replace'
    ];

    public function __construct()
    {
        $this->fire();
    }

    /**
     * Only conduct the search and replace if not in the admin.
     * 
     * @return void
     */
    public function fire()
    {
        if (!is_admin()) 
        {
            add_action( 'template_redirect', array($this, 'templateRedirect') );
        }
    }

    /**
     * Catch the html dring the redirect
     * 
     * @return void
     */
    public function templateRedirect() 
    {
        ob_start( array($this, 'findAndReplace') );
    }

    /**
     * Do the search and replace
     * 
     * @param  $buffer contains html of entire page
     * @return string html
     */
    public function findAndReplace( $buffer ) 
    {
        foreach ( $this->phrasesToReplace as $key => $value ) 
        {
            $buffer = str_replace( $key, $value, $buffer );
        }

        return $buffer;
    }
    
}