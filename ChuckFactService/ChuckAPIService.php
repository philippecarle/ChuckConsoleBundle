<?php

namespace KK\Labs\ChuckConsoleBundle\ChuckFactService;

use GuzzleHttp\Client;

class ChuckAPIService {

	/**
	 * If user has not its own parameters set, value will be 'Chuck'
	 * @var string
	 */
	private $firstName;

	/**
	 * If user has not its own parameters set, value will be 'Norris'
	 * @var string
	 */
	private $lastName;

	/**
	 * After n seconds, cancel
	 * @var int
	 */
	private $timeout;

	/**
	 * @param string $firstName
	 * @param string $lastName
	 * @param int $timeout
	 */
	public function __construct($firstName = 'Chuck', $lastName = 'Norris', $timeout = 2)
	{
		$this
			->setFirstName($firstName)
			->setLastName($lastName)
			->setTimeout($timeout)
		;
	}

	/**
	 * @param string $firstName
	 * @return $this
	 */
	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;
		return $this;
	}

	/**
	 * @param string $lastName
	 * @return $this
	 */
	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
		return $this;
	}

	/**
	 * @param int $timeout
	 * @return $this
	 */
	public function setTimeout($timeout)
	{
		$this->timeout = $timeout;
		return $this;
	}


	/**
	 * Get fact from Internet Chuck Norris Database
	 * @return string
	 */
	public function getFact()
	{
		$response = $this->getResponse();

		//if status is not 200 then return false
		if($response->getStatusCode() == 200){
			$datas = json_decode($response->getBody());
			return html_entity_decode(stripslashes($datas->value->joke));
		}
	}

	/**
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	private function getResponse()
	{
		$client = $this->getClient();

		$response = $client->get("random", [
			'query' => [
				'firstName' => $this->firstName,
				'lastName' => $this->lastName
			]
		]);

		return $response;
	}

	/**
	 * @return Client
	 */
	private function getClient()
	{
		return new Client([
			'base_uri' => 'http://api.icndb.com/jokes/',
			'timeout' => $this->timeout
		]);
	}
}
