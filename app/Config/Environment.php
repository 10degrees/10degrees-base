<?php

namespace App\Config;

class Environment
{
	protected $localUrls = [
		'.local',
		'.lndo.site',
	];

	protected $stagingUrls = [
		'wpengine.com'
	];

	public function isLocal()
	{
		return $this->search($this->localUrls);
	}

	public function isStaging()
	{
		return $this->search($this->stagingUrls);
	}

	public function isProduction()
	{
		return $this->getEnvironment() == 'production';
	}

	public function getEnvironment()
	{
		if ($this->isLocal()) 
		{
			return 'local';
		}

		if ($this->isStaging()) 
		{
			return 'staging';
		}

		return 'production';
	}

	protected function search($urls)
	{
		foreach ($urls as $url) 
		{
			if (stristr( $_SERVER['SERVER_NAME'], $url ) ) 
			{
				return true;
			}
		}

		return false;
	}
}