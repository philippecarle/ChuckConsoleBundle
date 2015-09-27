<?php

namespace KK\Labs\ChuckConsoleBundle\Tests\ChuckFactService;

use KK\Labs\ChuckConsoleBundle\ChuckFactService\ChuckAPIService;
use KK\Labs\ChuckConsoleBundle\Tests\Fixtures\app\AppKernel;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ChuckFactServiceTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var ContainerInterface
	 */
	private $container;


	protected function setUp()
	{
		$kernel = new AppKernel('test', true);
		$kernel->boot();

		$this->container = $kernel->getContainer();
	}

	public function testServiceIsDefinedInContainer()
	{
		$service = $this->container->get('kk_labs_chuck_console.api_query');

		$this->assertInstanceOf('KK\Labs\ChuckConsoleBundle\ChuckFactService\ChuckAPIService', $service);
	}


	public function testGetCustomFact()
	{
		$firstName = substr(str_shuffle(MD5(microtime())), 0, 10);
		$lastName = substr(str_shuffle(MD5(microtime())), 0, 10);

		$this->assertRegExp("/$firstName|$lastName/", $this->getFacts($firstName, $lastName));
	}


	public function testGetChuckFact()
	{
		$this->assertRegExp("/Chuck|Norris/", $this->getFacts());
	}

	private function getFacts($firstName = 'Chuck', $lastName = 'Norris')
	{
		$chuck = new ChuckAPIService($firstName, $lastName, 5);

		$facts = "";
		for($i = 0; $i < 5; $i++ ) {
			$facts.= $chuck->getFact();
		}

		return $facts;
	}

}