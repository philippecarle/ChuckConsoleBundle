<?php

namespace KK\Labs\ChuckConsoleBundle\EventListener;

use GuzzleHttp\Client;
use Symfony\Component\Console\Event\ConsoleTerminateEvent;

class ConsoleTerminateListener
{

	private $lastName;
	private $firstName;

	public function __construct($firstName, $lastName)
	{
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}

	public function onConsoleTerminate(ConsoleTerminateEvent $event)
	{
		$output = $event->getOutput();

		$client = new Client([
			'base_url' => [
				'http://api.icndb.com/jokes/random?firstName={firstName}&lastName={lastName}',
				[
					'firstName' => $this->firstName,
					'lastName' => $this->lastName,
				]
			],
			'defaults' => [
				'timeout' => 10,
				'allow_redirects' => false,
			]
		]);
		$response = $client->get();

		if($response->getStatusCode() == 200){
			$datas = $response->json();
			$output->writeln(stripslashes($datas['value']['joke']));
		}

	}
}
