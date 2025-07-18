<?php

namespace App\Boot;

/**
 * Google Maps API Instructions
 *
 * 1. Make sure you're logged in as support@10degrees.uk
 * 2. Go to https://developers.google.com/maps/documentation/javascript/
 * 3. Click "Get a key"
 * 4. Create a key
 * 5. Name the project as per the domain, using spaces, .e.g. domain-co-uk
 * 6. Ensure you add these domains as authorised: *.domain.dev, *.domain.co.uk, domain.wpengine.com, domain.staging.wpengine.com
 * 7. Replace YOUR_API_KEY in wp_enqueue_script call below
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class GoogleMapsAPIIntegration
{
    /**
     * Set this to true if using Google Maps
     *
     * @var boolean
     */
    protected $enableGoogleMaps = false;

    /**
     * Paste your Google Maps API Key here
     *
     * @var string
     */
    protected $apiKey = '';

    /**
     * If Google Maps is enabled, register the API key and enqueue the javascript file.
     */
    public function __construct()
    {
        if (!$this->enableGoogleMaps) {
            return;
        }

        add_action('acf/init', [$this, 'registerAPIKey']);

        add_action('wp_enqueue_scripts', [$this, 'enqueue'], 100);
    }

    /**
     * Registers the Google Maps API Key in the ACF Settings
     *
     * @return void
     */
    public function registerAPIKey()
    {
        acf_update_setting('google_api_key', $this->apiKey);
    }

    /**
     * Enqueues the Google Maps API JS with your API key. Feel free to
     * add conditionals here if only required on specific page
     * templates or custom post types. 
     * 
     * initGoogleMaps callback defined in \src\js\common\google-map-init.js
     * 
     * @return void
     */
    public function enqueue()
    {
        wp_enqueue_script(
            'google-maps',
            '//maps.googleapis.com/maps/api/js?key=' . $this->apiKey . '&callback=initGoogleMaps',
            array(),
            '3',
            true
        );
    }
}
