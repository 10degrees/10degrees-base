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
    /**
     * Check if environment is local
     *
     * @return boolean
     */
    public function isLocal()
    {
        return $this->getEnvironment() == 'local';
    }

    /**
     * Check if environment is local
     *
     * @return boolean
     */
    public function isDevelopment()
    {
        return $this->getEnvironment() == 'development';
    }

    /**
     * Check if environment is staging
     *
     * @return boolean
     */
    public function isStaging()
    {
        return $this->getEnvironment() == 'staging';
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
        return wp_get_environment_type();
    }
}
