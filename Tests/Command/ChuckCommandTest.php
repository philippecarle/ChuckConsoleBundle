<?php

namespace KK\Labs\ChuckConsoleBundle\Tests\Command;

use KK\Labs\ChuckConsoleBundle\ChuckFactService\ChuckAPIService;
use KK\Labs\ChuckConsoleBundle\Command\ChuckCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class ChuckCommandTest extends \PHPUnit_Framework_TestCase
{
	public function testExecute()
	{
		$firstName = substr(str_shuffle(MD5(microtime())), 0, 10);
		$lastName = substr(str_shuffle(MD5(microtime())), 0, 10);

		$application = new Application();
		$application->add(new ChuckCommand());

		$command = $application->find("chuck:fact");
		$command->setContainer($this->getMockContainer());
		$commandTester = new CommandTester($command);
		$commandTester->execute(array(
			'command'       => $command->getName(),
			'firstName'      => $firstName,
			'lastName'      => $lastName,
		));

		$this->assertRegExp("/$firstName|$lastName/", $commandTester->getDisplay());

	}

	protected function getMockContainer()
	{
        $mockContainer = $this->getMock('Symfony\Component\DependencyInjection\Container');
		$mockContainer
			->expects($this->once())
			->method('get')
			->with('kk_labs_chuck_console.fact_service')
			->willReturn(new ChuckAPIService());
        return $mockContainer;
    }
}
