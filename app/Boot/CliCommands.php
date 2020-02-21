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
        if (!class_exists('WP_CLI')) {
            return;
        }
        \WP_CLI::add_command('td', $this);
    }

    /**
     * Creates a custom ACF block TD Style
     *
     * @param array $args       List of args
     * @param array $assoc_args Flag arguments
     *
     * @return void
     */
    public function block($args, $assoc_args)
    {
        /**
         * Setup vars for directory and block names
         *
         * $blockName is the kebab-case component name
         *   - used for registration, scss/partial filename
         *   - used in partial for classname
         *   - used in scss for classname
         *
         * $blockClassName is the PascalCase component name
         *   - used for ACF_Block registration classname
         *   - added to BlockServiceProvider.php
         */
        $theme_path = trailingslashit(get_template_directory());
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
        $create_block_result = $this->createAcfBlock($theme_path, $blockClassName, $blockTitle);
 
        if($create_block_result !== true) {
            return;
        }

        /**
         * Reference in block service provider
         */

        //Get service provider file
        $block_service_provider_file_contents = file_get_contents($theme_path.'app/Providers/BlockServiceProvider.php');

        //Pattern tries to match block classname
        $pattern = "'\\App\\ACF_Blocks\\".$blockClassName."'";
        $result = preg_match($pattern, $block_service_provider_file_contents);

        if ($result) {
            //If already exists abort
            \WP_CLI::line('Block already registered. Get outta here! [1]');
        } else {
            //Add reference to newly created class at the end of the array
            $pattern = "/];/";
            $replace = "    '\\App\\ACF_Blocks\\".$blockClassName."',";
            $replace .= "\n    ];";
            $block_service_provider_file_contents = preg_replace("/];/", $replace, $block_service_provider_file_contents);
            $result = file_put_contents($theme_path.'app/Providers/BlockServiceProvider.php', $block_service_provider_file_contents);
            \WP_CLI::line('Block registration class referenced created in BlockServiceProvider');
        }
        
        /**
         * Create partial
         */

        //Get template
        $partial_contents = file_get_contents($theme_path.'partials/cli-templates/block-partial.php');
        //Replace placeholder(s)
        $partial_contents = preg_replace('/__BLOCK_NAME__/', $blockTitle, $partial_contents);
        //Write file
        $result = file_put_contents($theme_path.'partials/blocks/'.$blockTitle.'.php', $partial_contents);

        if ($result) {
            \WP_CLI::line('Partial created');
        }

        /**
         * Create SCSS (optional)
         */
        \WP_CLI::confirm('Would you like SCSS?', $assoc_args_scss = array());
        
        //Get template
        $scss_contents = file_get_contents($theme_path.'partials/cli-templates/block-style.scss');
        //Replace placeholder(s)
        $scss_contents = preg_replace('/__BLOCK_NAME__/', $blockName, $scss_contents);
        //Write file
        $result = file_put_contents($theme_path.'src/scss/common/blocks/_'.$blockName.'.scss', $scss_contents);

        if ($result) {
            \WP_CLI::line('SCSS created');
        }

        /**
         * Reference SCSS in _blocks.scss
         */
        //Get template
        $scss_main_contents = file_get_contents($theme_path.'src/scss/common/blocks/_blocks.scss');

        $pattern = '@import "'.$blockName.'";';
        $result = preg_match($pattern, $scss_main_contents);

        if ($result) {
            //If already exists abort
            \WP_CLI::line('Block SCSS already added to _block.scss. Get outta here! [1]');
        } else {
            $scss_main_contents .= "\n";
            $scss_main_contents .= '@import "'.$blockName.'";';
        }

        $scss_main_contents = preg_replace('/__BLOCK_NAME__/', $blockName, $scss_main_contents);
        $result = file_put_contents($theme_path.'src/scss/common/blocks/_blocks.scss', $scss_main_contents);

        
        if ($result) {
            \WP_CLI::line('SCSS file imported to _blocks.scss');
        }
        
        \WP_CLI::success('All done. Get outta here!');
    }

    /**
     * Creates an ACF block registration class
     *
     * @param [type] $theme_path
     * @param [type] $blockClassName
     * @param [type] $blockTitle
     * @param [type] $blockPath
     * 
     * @return void
     */
    public function createAcfBlock($theme_path, $blockClassName, $blockTitle, $blockPath = 'app/ACF_Blocks/') {

        //Define paths
        $block_file_path = $theme_path.$blockPath.$blockClassName.'.php';
        $block_template_path = $theme_path.'partials/cli-templates/Block.php';

        //Check if block already exists
        if (file_exists($block_file_path)) {
            \WP_CLI::error('Block file already exists. Get outta here!', false);
            return false;
        }

        //Get template
        $template = file_get_contents($block_template_path);

        //Replace placeholder(s)
        $template = preg_replace('/__BLOCK_CLASSNAME__/', $blockClassName, $template);
        $template = preg_replace('/__BLOCK_TITLE__/', $blockTitle, $template);
        $template = preg_replace('/__BLOCK_NAME__/', $blockTitle, $template);

        //Write file
        $result = file_put_contents($block_file_path,  $template);

        //Check if successful
        if (!$result) {
            \WP_CLI::error('Failed to create file: '.$block_file_path, false);
            return false;
        }

        //Great success https://untappd.akamaized.net/photo/2017_08_05/c1e3366ff091d1b65c903dddfcd2f036_320x320.jpg
        return true;

    }
}
