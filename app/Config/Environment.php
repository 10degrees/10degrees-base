<?php

namespace App\Config;

 /**
  * Environment settings
  *
  * @category Theme
  * @package  TenDegrees/10degrees-base
  * @author   10 Degrees <wordpress@10degrees.uk>
  * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
  * @link     https://github.com/10degrees/10degrees-base
  * @since    2.0.0
  */
class Environment
{
    protected $localUrls = [
        '.local',
        '.lndo.site',
    ];

    protected $stagingUrls = [
        'wpengine.com'
    ];

    /**
     * Check if environment is local
     *
     * @return boolean
     */
    public function isLocal()
    {
        return $this->search($this->localUrls);
    }

    /**
     * Check if environment is staging
     *
     * @return boolean
     */
    public function isStaging()
    {
        return $this->search($this->stagingUrls);
    }

    /**
     * Check if environment is production
     *
     * @return boolean
     */
    public function isProduction()
    {
        return $this->getEnvironment() == 'production';
    }

    /**
     * Get the environment
     *
     * @return string $environment
     */
    public function getEnvironment()
    {
        if ($this->isLocal()) {
            return 'local';
        }

        if ($this->isStaging()) {
            return 'staging';
        }

        return 'production';
    }

    /**
     * Check if the site is one of the URLs
     *
     * @param array $urls An array of URLs
     *
     * @return boolean $found
     */
    protected function search($urls)
    {
        foreach ($urls as $url) {
            if (stristr($_SERVER['SERVER_NAME'], $url)) {
                return true;
            }
        }

        return false;
    }
}
