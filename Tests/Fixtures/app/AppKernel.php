<?php

namespace KK\Labs\ChuckConsoleBundle\Tests\Fixtures\app;

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
	public function registerBundles()
	{
		return array(
			new \KK\Labs\ChuckConsoleBundle\KKLabsChuckConsoleBundle(),
		);
	}

	public function registerContainerConfiguration(LoaderInterface $loader)
	{
		$loader->load(__DIR__.'/config/config_test.yml');
	}

	/**
	 * @return string
	 */
	public function getCacheDir()
	{
		$cacheDir = sys_get_temp_dir().'/cache';
		if (!is_dir($cacheDir)) {
			mkdir($cacheDir, 0777, true);
		}

		return $cacheDir;
	}

	/**
	 * @return string
	 */
	public function getLogDir()
	{
		$logDir = sys_get_temp_dir().'/logs';
		if (!is_dir($logDir)) {
			mkdir($logDir, 0777, true);
		}

		return $logDir;
	}
}