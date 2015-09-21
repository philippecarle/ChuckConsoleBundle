<?php

namespace KK\Labs\ChuckConsoleBundle\EventListener;

use KK\Labs\ChuckConsoleBundle\ChuckFactService\ChuckAPIService;
use KK\Labs\ChuckConsoleBundle\Command\ChuckCommand;
use Symfony\Component\Console\Event\ConsoleTerminateEvent;

class ConsoleTerminateListener
{

	private $chuckApiService;

	public function __construct(ChuckAPIService $chuckAPIService)
	{
		$this->chuckApiService = $chuckAPIService;
	}

	public function onConsoleTerminate(ConsoleTerminateEvent $event)
	{
		if(!$event->getCommand() instanceof ChuckCommand && $fact = $this->chuckApiService->getFact()) {
			$event->getOutput()->writeln($fact);
		}
	}
}
