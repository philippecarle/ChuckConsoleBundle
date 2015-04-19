<?php

namespace KK\Labs\ChuckConsoleBundle\EventListener;

use GuzzleHttp\Client;
use KK\Labs\ChuckConsoleBundle\ChuckFactService\ChuckAPIService;
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
		$output = $event->getOutput();

		if($fact = $this->chuckApiService->getFact()){
			$output->writeln($fact);
		}

	}
}
