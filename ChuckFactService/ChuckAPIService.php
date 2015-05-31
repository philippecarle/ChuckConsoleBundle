<?php
/**
 * Created by PhpStorm.
 * User: philippe
 * Date: 19/04/15
 * Time: 19:20
 */

namespace KK\Labs\ChuckConsoleBundle\ChuckFactService;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;


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

	public function __construct($firstName, $lastName)
	{
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}

	/**
	 * Get fact from Internet Chuck Norris Database
	 * @return bool|string
	 */
	public function getFact()
	{
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

		try{
			$response = $client->get();
		} catch(ConnectException $e){
			return;
		}

		//if status is not 200 then return false
		if($response->getStatusCode() == 200){
			$datas = $response->json();
			return html_entity_decode(stripslashes($datas['value']['joke']));
		} else {
			return false;
		}
	}
}
