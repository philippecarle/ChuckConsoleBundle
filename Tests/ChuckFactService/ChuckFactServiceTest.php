<?php

namespace KK\Labs\ChuckConsoleBundle\Tests\ChuckFactService;

use KK\Labs\ChuckConsoleBundle\ChuckFactService\ChuckAPIService;

class ChuckFactServiceTest extends \PHPUnit_Framework_TestCase
{
	public function testGetFact()
	{
		$firstName = substr(str_shuffle(MD5(microtime())), 0, 10);
		$lastName = substr(str_shuffle(MD5(microtime())), 0, 10);

		$chuck = new ChuckAPIService($firstName, $lastName, 5);
		$fact = $chuck->getFact();

		$this->assertStringMatchesFormat("%S$firstName%S$lastName%S", $fact);
	}
}