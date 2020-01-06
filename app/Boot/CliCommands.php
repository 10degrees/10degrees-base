<?php

namespace App\Boot;

/**
 * CliCommands
 *
 * Add custom WP CLI commands
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class CliCommands
{
    /**
     * Constructor
     */
    public function __construct()
    {
        if(!class_exists('WP_CLI')) {
            return;
        }
        \WP_CLI::add_command('td', $this);
    }

    /**
     * Creates a custom ACF block TD Style
     *
     * @param array $args       List of args
     * @param array $assoc_args Flag arguments
     * @return void
     */
    public function block($args, $assoc_args)
    {
        /**
         * Setup vars for dicrectory and block names
         */
        $path = trailingslashit(get_template_directory());
        $blockName = strtolower($args[0]);
        $blockClassNameParts = explode('-', $args[0]);
        $blockClassName = '';
        foreach ($blockClassNameParts as $part) {
            $blockClassName .= ucfirst($part);
        }
        $blockTitle = strtolower($blockName);

        /**
         * Create block
         */
         /**
         * Check if block already exists! (app/ACF_Blocks)
         */
        if (file_exists($path.'app/ACF_Blocks/'.$blockClassName.'.php')) {
            \WP_CLI::error( 'Block file already exists. Get outta here!', false);
        }

        /**
         * Create register block in app/ACF_Blocks
         */
        $template = file_get_contents($path.'partials/cli-templates/Block.php');
        $template = preg_replace('/__BLOCK_CLASSNAME__/', $blockClassName, $template);
        $template = preg_replace('/__BLOCK_TITLE__/', $blockTitle, $template);
        $template = preg_replace('/__BLOCK_NAME__/', $blockTitle, $template);
        $result = file_put_contents($path.'app/ACF_Blocks/'.$blockClassName.'.php',  $template);

        if($result) {
            \WP_CLI::line( 'Block registration class added' );
        }

        /**
         * Reference in block service provider
         */
        //Get service procider file
        $block_service_provider_file_contents = file_get_contents($path.'app/Providers/BlockServiceProvider.php');
        //Pattern tries to match block classname
        $pattern = "'\\App\\ACF_Blocks\\".$blockClassName."'";
        $result = preg_match($pattern, $block_service_provider_file_contents);
        //If already exists abort mission
        if ($result) {
            \WP_CLI::error('Block already registered. Get outta here! [1]');
        } else {
            //Add reference to newly created class at the end of the array
            $pattern = "/];/";
            $replace = "    '\\App\\ACF_Blocks\\".$blockClassName."',";
            $replace .= "\n    ];";
            $block_service_provider_file_contents = preg_replace("/];/", $replace, $block_service_provider_file_contents);
            $result = file_put_contents($path.'app/Providers/BlockServiceProvider.php', $block_service_provider_file_contents);
            \WP_CLI::line('Block registration class referenced in BlockServiceProvider');
        }
        
        /**
         * Create partial
         */
        //Grab template
        $partial_contents = file_get_contents($path.'partials/cli-templates/block-partial.php');
        //Replace placeholder(s)
        $partial_contents = preg_replace('/__BLOCK_NAME__/', $blockTitle, $partial_contents);
        //Write file
        $result = file_put_contents($path.'partials/blocks/'.$blockTitle.'.php', $partial_contents);

        if ($result) {
            \WP_CLI::line( 'Partial created' );
        }

        /**
         * Create SCSS (optional)
         */
        \WP_CLI::confirm('Would you like SCSS?', $assoc_args_scss = array());
        
         //Grab template
        $scss_contents = file_get_contents($path.'partials/cli-templates/block-style.scss');
        //Replace placeholder(s)
        $scss_contents = preg_replace('/__BLOCK_NAME__/', $blockName, $scss_contents);
        //Write file
        $result = file_put_contents($path.'src/scss/common/_'.$blockName.'.scss', $scss_contents);

        if ($result) {
            \WP_CLI::line( 'SCSS created' );
        }
        //@TODO Reference in common

        //@TODO Add JS (optional) & reference in main 
        \WP_CLI::success('All done. Get outta here!');
    }
}
