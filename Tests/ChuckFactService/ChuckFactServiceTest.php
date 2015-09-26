<?php

namespace KK\Labs\ChuckConsoleBundle\Tests\ChuckFactService;

use KK\Labs\ChuckConsoleBundle\ChuckFactService\ChuckAPIService;

class ChuckFactServiceTest extends \PHPUnit_Framework_TestCase
{
	public function testGetCustomFact()
	{
		$firstName = substr(str_shuffle(MD5(microtime())), 0, 10);
		$lastName = substr(str_shuffle(MD5(microtime())), 0, 10);

		$this->assertStringMatchesFormat("%S$firstName%S$lastName%S", $this->getFacts($firstName, $lastName));
	}


	public function testGetChuckFact()
	{
		$this->assertStringMatchesFormat("%SChuck%SNorris%S", $this->getFacts());
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