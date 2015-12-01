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

        $this->randomFirstName = substr(str_shuffle(MD5(microtime())), 0, 10);
        $this->randomLastName = substr(str_shuffle(MD5(microtime())), 0, 10);

        $this->container = $kernel->getContainer();
    }

    public function testServiceIsDefinedInContainer()
    {
        $service = $this->container->get('kk_labs_chuck_console.fact_service');

        $this->assertInstanceOf('KK\Labs\ChuckConsoleBundle\ChuckFactService\ChuckAPIService', $service);
    }

    public function testGetCustomFact()
    {
        $this->assertRegExp(
            "/$this->randomFirstName|$this->randomLastName/",
            $this->getFacts($this->randomFirstName, $this->randomLastName)
        );
    }

    public function testGetChuckFact()
    {
        $this->assertRegExp('/Chuck|Norris/', $this->getFacts());
    }

    /**
     * @param string $firstName
     * @param string $lastName
     *
     * @return string
     */
    private function getFacts($firstName = 'Chuck', $lastName = 'Norris')
    {
        $chuckService = $this->getChuckService($firstName, $lastName);

        $facts = '';
        for ($i = 0; $i < 5; ++$i) {
            $facts .= $chuckService->getFact();
        }

        return $facts;
    }

    /**
     * @param string $firstName
     * @param string $lastName
     *
     * @return ChuckAPIService
     */
    private function getChuckService($firstName = 'Chuck', $lastName = 'Norris')
    {
        return new ChuckAPIService($firstName, $lastName, 5);
    }
}
