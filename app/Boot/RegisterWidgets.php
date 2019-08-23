<?php

namespace App\Boot;

/**
 *
 * Register the widgets for the theme.
 * 
 */
class RegisterWidgets
{
    /**
     * The Widgets to register with the theme
     *
     * Example:
     * 
     * 'widget-id' => 'Widget name'
     * 
     * @var array
     */
    protected $widgets = [
        // 'blog-sidebar' => 'Blog sidebar',
    ];

    public function __construct()
    {
        $this->register();
    }

    public function register() 
    {
        foreach ($this->widgets as $key => $label) 
        {
            register_sidebar([
                'name'          => __( $label, '@textdomain' ),
                'id'            => $key,
                'before_widget' => '<section class="widget %1$s %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3>',
                'after_title'   => '</h3>',
            ]);
        }
    }

}
